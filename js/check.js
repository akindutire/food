// JavaScript Document
$(function(){
	var x=101;
	var r='<img src="../images/r.gif" height="auto" width="20px">';
	var c='<img src="../images/accept.png" height="auto" width="20px">';
	
	login=function(e){
		e.preventDefault();
		var pwd=$('#pwd').val(),
		usr=$('#usr').val(),
		url=$(this).closest('form').attr('action');
		$('#feedback').html('<center>'+r+'</center>');
		$.post(url,{'usr':usr,'pwd':pwd},function(data){
			if(data==x){
				window.location='index.php?ref=cpanel';
			}else{
				$('div #feedback').html(data);
				}
			});
		
		}
	
	addmember=function(e){
		e.preventDefault();
		var name=$('#name').val(),
		tel=$('#tel').val(),
		pwd=$('#pwd').val(),
		sex=$('#sex').val(),
		addr=$('#addr').val(),
		dpt=$('#dpt').val(),
		role=$('#role').val(),
		url=$(this).closest('form').attr('action');
		//alert(name);
		
		$('#feedback').html('<center>'+r+' Creating Account...</center>');
		$.post(url,{'role':role,'name':name,'tel':tel,'pwd':pwd,'sex':sex,'addr':addr,'dpt':dpt},function(data){
			
				$('#feedback').html(data);		
			});
		
		}
	
	addcat=function(e){
		e.preventDefault();
		var cat=$('#cat').val(),
		url=$(this).closest('form').attr('action');
		//alert(name);
		
		$('#feedback').html('<center>'+r+'	Creating Category...</center>');
		$.post(url,{'cat':cat,'addid':1},function(data){
				if (data==x) {

					$('#feedback').html('<center>'+c+' Successfully Added A Category</center>');
				}else{

					$('#feedback').html(data);		

				}

			});	
		}

	addproduct=function(e){
		e.preventDefault();
		var cat=$('#cat').val(),
		des=$('#des').val(),
		product=$('#product').val(),
		qty=$('#qty').val(),
		cprice=$('#cprice').val(),
		uprice=$('#uprice').val(),
		discount=$('#discount').val(),

		url=$(this).closest('form').attr('action');
		//alert(name);
		
		$('#feedback').html('<center>'+r+'	Adding Meal...</center>');
		$.post(url,{'des':des,'product':product,'qty':qty,'cprice':cprice,'uprice':uprice,'discount':discount,'cat':cat,'addid':2},function(data){
				if (data==x) {

					$('#feedback').html('<center>'+c+' Successfully Added A Meal</center>');
				}else{

					$('#feedback').html(data);		

				}

			});	
		}


	pfile=function(event){
			event.preventDefault();
			var fdta=new FormData($('form:file')[0]);
			$.each($('#pfile')[0].files,function(i,file){
				fdta.append('file',file);
				});
				//fdta.serialize();
			
				$.ajax({
					url: '../process/uaskl.php',
           			type: 'POST',
            		data: fdta,
					contentType:false,
					processData:false,
					cache:false,

					beforeSend:function(event){
						
							
						$('#feedback').html('<center>'+r+' Please Wait Your File is being Uploaded...</center>');
								
						},
					error:function(){
						alert('An Error Occured, Try Again');
						},
            		success: function (data) {
						if(data==x){
							$('#feedback').empty().html('<b>'+r+'&nbsp;<span style="color:green;">File Ready</span>:Waiting For Other Fields For Submission.</b>');
							
						}else{
							$('#feedback').html(data);
							}
					}
        			});
			}
			
	getsubclass=function(event){
		
		} 	
			
	adddoctolibrary=function(event){
        	
			var fdta=new FormData($('form:file')[0]);
			$.each($('#hfile')[0].files,function(i,file){
				fdta.append('hfile',file);
				});

				//Progress
				$('#feedback').html('<center>'+r+'</center>');
				
				$.ajax({
					url: '../../process/updf.php',
           			type: 'POST',
            		data: fdta,
					contentType:false,
					processData:false,
					cache:false,
					
					error:function(){
						alert('An Error Occured, Try Again');
						},
            		success: function (data) {
						if(data==x){
							$('#feedback').empty().html('<b>'+r+'&nbsp;<span style="color:green;">Document Ready</span>:Waiting For Other Fields For Submission.</b>');
							
						}else{
							$('#feedback').html(data);
							}
                		
					}
        			});
		}

	deletecat=function(event){

		event.preventDefault();

		var data=new Array();
			$($("input[name='catcheck[]']:checked")).each(function(){
				data.push($(this).val());
				});
		var url=$(this).closest('form').attr('action');


		$.post(url,{'deleteid':1,'catcheck':data},function(data){

				$('table').html('<center>'+r+' Refreshing Category ...</center>');
				if(data==x){

					$.post('../process/retrieve.php',{'retrieveid':1},function(data){
						$('table').html(data);
						
					});


				}else{

					alert('Delete Failed, An Error Occured');
				}
				
		});
	}

	deletefromcart=function(event){

		event.preventDefault();
		
		var data=new Array();
			$($("input[name='prolist[]']:checked")).each(function(){
				data.push($(this).val());
				});
		var url='../process/deleteitems.php';
		

		$.post(url,{'deleteid':3,'prolist':data},function(data){

				
			if(data==x){
				
				var url='../process/retrieve.php';
				
				$('#shopping_cart cc').html('<center>'+r+' Refreshing Cart ...</center>');

				$.post(url,{'retrieveid':3},function(data){

					$('#shopping_cart cc').html(data);
				});
			
			}else{

				alert(data);
			}
				
		});
	}


	deletepro=function(event){

		event.preventDefault();

		var data=new Array();
			$($("input[name='procheck[]']:checked")).each(function(){
				data.push($(this).val());
				});
		var url=$(this).closest('form').attr('action');
		var cat=$('#icat').val();

		$.post(url,{'deleteid':2,'procheck':data},function(data){

				$('table').html('<center>'+r+' Refreshing Product ...</center>');
				if(data==x){

					$.post('../process/retrieve.php',{'retrieveid':2,'cat':cat},function(data){
						$('table').html(data);
						
					});


				}else{

					alert('Delete Failed, An Error Occured');
				}
				
		});
	}
	
	updatepro=function(event){
		
		event.preventDefault();

		var url=$(this).closest('form').attr('action'),
		id=$('#product_id').val(),
		cprice=$('#cprice').val(),
		uprice=$('#uprice').val(),
		discount=$('#discount').val(),
		des=$('#des').val(),
		cur_qty=$('#cur_qty').val(),		
		qty=$('#qty').val();

			$.post(url,{'product_id':id,'cprice':cprice,'uprice':uprice,'discount':discount,'des':des,'cur_qty':cur_qty,'qty':qty,'upid':1},function(data){

				if (data==x) {

					$('#feedback').html('<center>'+c+' You Have Successfully Updated A Product</center>');

				}else{

					alert(data);
				}

			},'html');
		}
	
	addtocart=function(event){
		event.preventDefault();
		
		

		var url='../process/add.php', 
		product=$(this).prev('input').val(),
		qty=$('#qtyorder').val();
		

		$.post(url,{'addid':3,'qtyorder':qty,'product':product},function(data){

			if(data==x){
				
				var url='../process/retrieve.php';
				$.post(url,{'retrieveid':3},function(data){
					
					$('#shopping_cart cc').html(data);
				});
			
			}else{

				alert(data);
			}
		});

	}

		
	
	verifycustomer=function(event){
		event.preventDefault();
		
				var orderid=$('#orderid').val(),
				url='../process/retrieve.php';
				
				$('#feedback').html('<center><img src="../images/r.gif" width="20px">	Verifying Customer ID...</center>');

				$.post(url,{'orderid':orderid,'retrieveid':4},function(data){
					if(data==x){
						window.location='index.php?ref=deliver&hcomponent=1&orders='+orderid;	
					}else{
						$('#feedback').html(data);
					}
					
				});
		}

	iborrow=function(){
		bk=$(this).data('idr');
		
		
		}
	


/************************End Function*************************************/


/* **********************|Binders|****************************************** */
	
	$('#sblogin').bind('click',login);
	$('#sbcat').bind('click',addcat);
	$('#pfile').bind('change',pfile);
	$('#sbprod').bind('click',addproduct);
	$('#sbdeletecat').bind('click',deletecat);
	$('#sbdeletepro').bind('click',deletepro);
	$('#sbuppro').bind('click',updatepro);
	$('a#tocart').on('click',addtocart);
	$('#deletefromcart').bind('click',deletefromcart);
	$('#sbverifycustomer').bind('click submit',verifycustomer);
	//$('#right cc').on('click','a',removefromshelf);
	//$('#callno').bind('keyup',searchusingcallno);
	//$('#right cc').on('click','#bwbk',iborrow);
	//$('#acprq').bind('click',acceptrequest);
	//$('#dcrrq').bind('click',declinerequest);
	//$('#delbr').bind('click',returntolib);
	//$('p > a').bind('click',opensubclass);
	
	
});