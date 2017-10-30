$(document).ready(function()
{
	
	
	$("#userid").on('focus',function() { $("#userid_err").html(''); });
	$("#password").on('focus',function() { $("#pwd_err").html(''); });

	
	$("#userid, #password").keydown(function (e) 
	{
  		if (e.keyCode == 13) { $("#login_btn").trigger('click');   }
	});

	
	
	$("#login_btn").on('click',function()
		{
			var OnClick = $(this);

			var userid = $("#userid").val();
				userid = $.trim(userid);
		
			var password = $("#password").val();
				password = $.trim(password);
			
			var err_cnt ="0";
			
			if(userid=='') 	{ err_cnt="1"; $("#userid_err").html('Userid is required'); }
			if(password==''){ err_cnt="1"; $("#pwd_err").html('Password is required'); }
			
			if(err_cnt=="0")
			{
				
				$.ajax({
							url:base_url+"Requestdispatcher/validateuser",
							method:"POST",
							data:{"userid":userid,"password":password},
							beforeSend:function() { OnClick.prop('disabled',true); OnClick.addClass('btn-danger'); OnClick.html("Validating...."); },
							success:function(resp)
							{
								resp = $.trim(resp);
								
								if(resp=="1")
								{
									window.location.href=base_url+"dashboard";
								}
								else
								{
									OnClick.prop('disabled',false); OnClick.removeClass('btn-danger'); OnClick.html("Click Here Login"); 
									//$("form#login_form")[0].reset();
									$("#validate_msg").html('<span class="text-danger">Check your credentials</span>');
								}
							}
						
							
						});	
			}
						
		});
	

//activate or inactivate the subadmin

$(document).on('click',".act_inact",function() 
{ 
	var OnClick = $(this);
	
	var label = $(this).attr('actInct');
		label = $.trim(label);
	
	var ide = $(this).attr('ide');
		ide = $.trim(ide);
		
			
		
		if(confirm("Do you want to "+label+" this subadmin"))
		{
			
			if(label=="Active")
			{
				var loading = "Activating......";
				var addcls= "btn-success";
				var remcls = 'btn-danger';
				var font_awesome = "<i class='fa fa-check'></i>Activate";	
				var newlabel="Active";
			}
			else
			{
				var loading = "Inactivating......";
				var addcls= "btn-danger";
				var remcls = 'btn-success';
				var font_awesome = "<i class='fa fa-times'></i>Inactivate";	
				var newlabel="Inctive";
			}
			
			$.ajax({
						url:base_url+"Requestdispatcher/activate_inactivate_subadmin",
							method:"POST",
							data:{"ide":ide,"label":label},
							beforeSend:function() { OnClick.prop('disabled',true);  OnClick.html(loading); },
							success:function(resp)
							{
								resp = $.trim(resp);
								
								if(resp=="1")
								{
									OnClick.prop('disabled',false); 
									OnClick.removeClass(remcls); 
									OnClick.addClass(addcls); 
									OnClick.html(font_awesome);
									
									$("#Status_"+ide).html(newlabel); 
								}
								
							}
				});
		}
});


//add morepenalities featueres

$(".addmore_penalities").on('click',function()
{
	var parent = $(".penalities");
	
	if( parent.children().hasClass('morepenalities') )
	{
		
		$(".morepenalities:last-child").after('<div class="morepenalities total_penalities"> <div class="col-md-4 " >  <label for="PenalityNature">Nature Of Penality</label>  <input type="text" class="form-control PenalityNature" id="PenalityNature" name="PenalityNature[]" placeholder="Nature Of Penality" /> 	</div> <div class="col-md-4"> <label for="PenalityAmount">Penality Amount</label>  <input type="text" class="form-control PenalityAmount" id="PenalityAmount" name="PenalityAmount[]" placeholder="Penality Amount" /> </div> <i class="fa fa-times deletepenalities" aria-hidden="true"></i> <div class="clearfix"> </div></div>');
		
	}
	else
	{
		$(".firstpenality").after('<div class="morepenalities total_penalities"> <div class="col-md-4 " >  <label for="PenalityNature">Nature Of Penality</label>  <input type="text" class="form-control PenalityNature" id="PenalityNature" name="PenalityNature[]" placeholder="Nature Of Penality" /> 	</div> <div class="col-md-4"> <label for="PenalityAmount">Penality Amount</label>  <input type="text" class="form-control PenalityAmount" id="PenalityAmount" name="PenalityAmount[]" placeholder="Penality Amount" /> </div> <i class="fa fa-times deletepenalities" aria-hidden="true"></i> <div class="clearfix"> </div></div>');
						
	}
					
			
		
});


//delete the penalities

$(document).on('click',".deletepenalities",function() 
{
	
	if(confirm('Do you want to delete'))
	$(this).parent().remove();	
	
 });
 
 
 //submits the penalities
 
 $(document).on('click',"#penalities_btn",function() 
 	{
		
			
			var OnClick = $(this);
			
			var lrno = 	$("#LRNO").val();
			
			//check total penaliteis 
			var len = $(".total_penalities").length;
			var penalities_arr = [];

			var err_cnt ="0";
			$(".PenalityNature").each(function() 
			{ 
				
				var nature = $(this).val();
					nature = $.trim(nature);
					
				if(nature=='')	
				{
					if(len==1)
					{
						
						var newarr = {
										'PenalityNature':'No',
										'PenalityAmount':'0'
			
						};
						penalities_arr.push(newarr);
							$.ajax({

						url:base_url+"Requestdispatcher/submitpenalities",
						method:"POST",
						data:{"lrno":lrno,"penalities":'' },
						beforeSend:function() { OnClick.prop('disabled',true);  OnClick.html('Processing......'); },
						success:function(resp)
						{
								resp = $.trim(resp);
								window.location.href=base_url+"add-data";
							
						}
					});
							
							
							
					}
					else
					err_cnt ="1";			
				}
				else
				{
					var amount = $(this).parent().siblings().children(".PenalityAmount").val();
						amount = $.trim(amount);
					if(amount=='')
					{
						err_cnt="1";
						$(this).parent().siblings().children(".PenalityAmount").after('<span class="err-msg">adsdfd</span>');
					}
					else
					{
						var newarr = {
										'PenalityNature':nature,
										'PenalityAmount':amount
			
						};
						penalities_arr.push(newarr);
					}
					
				}
					
			});//looping throught the penalities
		
		if(err_cnt=="0")	
		{
			var Natureofpenality = $(".PenalityNature");
			var PenalityAmount= $(".PenalityAmount");
			
			$.ajax({

						url:base_url+"Requestdispatcher/submitpenalities",
						method:"POST",
						data:{"lrno":lrno,"penalities":penalities_arr },
						beforeSend:function() { OnClick.prop('disabled',true);  OnClick.html('Processing......'); },
						success:function(resp)
						{
							resp = $.trim(resp);
							
							if(resp=="1")
							{
								OnClick.prop('disabled',false); 
								window.location.href=base_url+"add-data";	
								
							}
							else
							{
								$(".penality_errmsg").html('Unable to add penalities contact admin');
							}
						}
					});
		}
			
			
			

	
	});




//add more repairs features

$(".addmore_repairs").on('click',function()
{
	var parent = $(".repairs");
	
	if( parent.children().hasClass('morerepairs') )
	{
		
		$(".morerepairs:last-child").after('<div class="morerepairs total_repairs"><div class="col-md-4 " > <label for="RepairNature">Nature Of Repair</label><input type="text" class="form-control RepairNature" id="RepairNature" name="RepairNature[]" placeholder="Nature Of Reapir" /></div><div class="col-md-4"><label for="RepairAmount">Repair Amount</label><input type="text" class="form-control RepairAmount" id="RepairAmount" name="RepairAmount[]" placeholder="Repair Amount" /></div><i class="fa fa-times deleterepairs" aria-hidden="true"></i> <div class="clearfix"> </div></div>');
		
	}
	else
	{
		$(".firstrepair").after('<div class="morerepairs total_repairs"><div class="col-md-4 " > <label for="RepairNature">Nature Of Repair</label><input type="text" class="form-control RepairNature" id="RepairNature" name="RepairNature[]" placeholder="Nature Of Reapir" /></div><div class="col-md-4"><label for="RepairAmount">Repair Amount</label><input type="text" class="form-control RepairAmount" id="RepairAmount" name="RepairAmount[]" placeholder="Repair Amount" /></div><i class="fa fa-times deleterepairs" aria-hidden="true"></i> <div class="clearfix"> </div></div>');
						
	}
					
			
		
});


//delete the penalities

$(document).on('click',".deleterepairs",function() 
{
	
	if(confirm('Do you want to delete'))
	$(this).parent().remove();	
	
 });
 
 
  //submits the repairs
 
 $(document).on('click',"#reapirs_btn",function() 
 	{
		

			
			var OnClick = $(this);
			
			var lrno = 	$("#LRNO").val();
			
			//check total penaliteis 
			var len = $(".total_repairs").length;
			var repairss_arr = [];

			var err_cnt ="0";
			$(".RepairNature").each(function() 
			{ 
				
				var nature = $(this).val();
					nature = $.trim(nature);
					
				if(nature=='')	
				{

					if(len==1)
					{
						var newarr = {
										'RepairNature':'No',
										'RepairAmount':'0'
			
						};
						repairss_arr.push(newarr);
						
						$.ajax({

						url:base_url+"Requestdispatcher/submitrepairs",
						method:"POST",
						data:{"lrno":lrno,"repairs":'' },
						beforeSend:function() { OnClick.prop('disabled',true);  OnClick.html('Processing......'); },
						success:function(resp)
						{
								resp = $.trim(resp);
								//window.location.href=base_url+"add-data";
							
						}
					});
							
							
							
					}
					else
					err_cnt ="1";			
				}
				else
				{
					
					var amount = $(this).parent().siblings().children(".RepairAmount").val();
						amount = $.trim(amount);
					if(amount=='')
					{
					
						err_cnt="1";
						$(this).parent().siblings().children(".RepairAmount").after('<span class="err-msg">Amount is required</span>');
					}
					else
					{
						var newarr = {
										'RepairNature':nature,
										'RepairAmount':amount
			
						};
						repairss_arr.push(newarr);
					}
					
				}
					
			});//looping throught the penalities
console.log(repairss_arr);

		if(err_cnt=="0")	
		{
			
			$.ajax({

						url:base_url+"Requestdispatcher/submitrepairs",
						method:"POST",
						data:{"lrno":lrno,"repairs":repairss_arr },
						beforeSend:function() { OnClick.prop('disabled',true);  OnClick.html('Processing......'); },
						success:function(resp)
						{
							resp = $.trim(resp);
							
							if(resp=="1")
							{
								window.location.href=base_url+"add-data";	
							}
							else
							{
								 OnClick.prop('disabled',false); 
								 OnClick.html('Proceed to other expenses');
								$(".repair_errmsg").html('Unable to add penalities contact admin');
							}
						}
					});
		}
			
			
			

	
	
	});

 



//add more repairs features

$(".addmore_expenses").on('click',function()
{
	var parent = $(".expenses");
	
	if( parent.children().hasClass('moreexpenses') )
	{
		
		$(".moreexpenses:last-child").after('<div class="moreexpenses total_expenses"><div class="col-md-4 " > <label for="expensenature">Nature Of expense</label><input type="text" class="form-control expensenature" id="expensenature" name="expensenature[]" placeholder="Nature Of Expense" /></div><div class="col-md-4"><label for="ExpenseAmount"> Amount</label><input type="text" class="form-control ExpenseAmount" id="ExpenseAmount" name="ExpenseAmount[]" placeholder="Amount" /></div><i class="fa fa-times deleteexpense" aria-hidden="true"></i> <div class="clearfix"> </div></div>');
		
	}
	else
	{
		$(".firstexpense").after('<div class="moreexpenses total_expenses"><div class="col-md-4 " > <label for="expensenature">Nature Of expense</label><input type="text" class="form-control expensenature" id="expensenature" name="expensenature[]" placeholder="Nature Of Expense" /></div><div class="col-md-4"><label for="ExpenseAmount"> Amount</label><input type="text" class="form-control ExpenseAmount" id="ExpenseAmount" name="ExpenseAmount[]" placeholder="Amount" /></div><i class="fa fa-times deleteexpense" aria-hidden="true"></i> <div class="clearfix"> </div></div>');
						
	}
					
			
		
});


//delete the penalities

$(document).on('click',".deleteexpense",function() 
{
	
	if(confirm('Do you want to delete'))
	$(this).parent().remove();	
	
 });
 
 
  //submits the expenses
 
 $(document).on('click',"#expenses_btn",function() 
 	{
		
		
			
			var OnClick = $(this);
			
			var lrno = 	$("#LRNO").val();
			
			//check total penaliteis 
			var len = $(".total_expenses").length;
			var expenses_arr = [];

			var err_cnt ="0";
			$(".expensenature").each(function() 
			{ 
				
				var nature = $(this).val();
					nature = $.trim(nature);
					
				if(nature=='')	
				{
					if(len==1)
					{
						var newarr = {
										'expensenature':'No',
										'ExpenseAmount':'0'
									};
						expenses_arr.push(newarr);
						
						$.ajax({

						url:base_url+"Requestdispatcher/submitexpenses",
						method:"POST",
						data:{"lrno":lrno,"expenses":'' },
						beforeSend:function() { OnClick.prop('disabled',true);  OnClick.html('Processing......'); },
						success:function(resp)
						{
								resp = $.trim(resp);
								//window.location.href=base_url+"add-data";
							
						}
					});
							
							
							
					}
					else
					err_cnt ="1";			
				}
				else
				{
					var amount = $(this).parent().siblings().children(".ExpenseAmount").val();
						amount = $.trim(amount);
					if(amount=='')
					{
						err_cnt="1";
						$(this).parent().siblings().children(".ExpenseAmount").after('<span class="err-msg">Amount is required</span>');
					}
					else
					{
						var newarr = {
										'expensenature':nature,
										'ExpenseAmount':amount
									};
						expenses_arr.push(newarr);
					}
					
				}
					
			});//looping throught the penalities

		if(err_cnt=="0")	
		{
			
			$.ajax({

						url:base_url+"Requestdispatcher/submitexpenses",
						method:"POST",
						data:{"lrno":lrno,"expenses":expenses_arr },
						beforeSend:function() { OnClick.prop('disabled',true);  OnClick.html('Processing......'); },
						success:function(resp)
						{
							resp = $.trim(resp);
							
							if(resp=="1")
							{
								window.location.href=base_url+"view-data";	
							}
							else
							{
								 OnClick.prop('disabled',false); 
								 OnClick.html('Proceed to other expenses');
								$(".expenses_errmsg").html('Unable to add penalities contact admin');
							}
						}
					});
		}
			
			
			

	
	
	}); 
 
 
 
 //transport popup
 
 $(document).on('click','.transportpopup',function() 
 { 
 	var	ide = $(this).attr('id');
		ide = $.trim(ide);
	
	var page=$(this).attr('page');	
	
	if(page=="add-customer-payment")
	{
		$(".transporthyperlink").remove();	
	}
	
	var expl= ide.split("_");
	
	//alert("LRNO:"+expl[0]+"SLNO:"+expl[1]);
	
	$(".POPUP-LRNO").html('<span class="text-primary">Transport details of LR#<b>'+expl[0]+'</b></span>');
	$(".transporthyperlink").attr('href',base_url+'edit-transport-data/'+expl[0]+'/'+expl[1]);
	
	$.ajax({
				url:base_url+"Requestdispatcher/gettransportdata",
						method:"POST",
						data:{"lrno":expl[0],"slno":expl[1],"page":page },
						
						success:function(resp)
						{
							resp = $.trim(resp);
							if(resp=='nodata')
							{
								$(".transportpopupdata").html('<div class="alert alert-warning">No data available</div>');
							}
							else
							{
								resp = $.parseJSON(resp);
								$.each(resp,function(index,value)
									{
										$("."+index).html(value);
									});
							}
							
						}
		});
	
	
 });

  //transport popup ends here
  
  $(document).on('click','.expensespopup',function() 
  { 
  	
	$(".expens, .repairs, .penalities").html('');
	
  	var ide = $(this).attr('id');
		ide = $.trim(ide);

	 var page = $(this).attr('page');
	 	
		
	
	var expl = ide.split("-");

	$(".expenses-lrno").html('<span class="text-primary">Expenses details of LR#<b>'+expl[0]+'</b></span>');
	
	$.ajax({
			
					url:base_url+"Requestdispatcher/getexpenses_lrno",
					method:"POST",
					data:{"lrno":expl[0],"slno":expl[1],"page":page },
					
					success:function(resp)
					{
						resp = $.parseJSON(resp);
								$.each(resp,function(index,value)
									{
										$("."+index).html(value);
									});
						
						
					}

			
			
			});
	
	
	
	
  });

//edit penalities section
//here we are dealing with the add more penaliteis in the edit section


$(".addmore_editpenalities").on('click',function()
{
	var parent = $(".penalities");
	
	if( parent.children().hasClass('morepenalities') )
	{

		
		$(".morepenalities:last-child").after('<div class="morepenalities total_penalities penality_0" id="0"> <div class="col-md-4 " >  <label for="PenalityNature">Nature Of Penality</label>  <input type="text" class="form-control PenalityNature" id="PenalityNature" name="PenalityNature[]" placeholder="Nature Of Penality" /> 	</div> <div class="col-md-4"> <label for="PenalityAmount">Penality Amount</label>  <input type="text" class="form-control PenalityAmount" id="PenalityAmount" name="PenalityAmount[]" placeholder="Penality Amount" /> </div><i class="fa fa-times delete_editpenality" aria-hidden="true" delexp="0"></i><div class="clearfix"> </div></div>');
		
	}
	else
	{
		$(".firstpenality").after('<div class="morepenalities total_penalities" id="0"> <div class="col-md-4 " >  <label for="PenalityNature">Nature Of Penality</label>  <input type="text" class="form-control PenalityNature penality_0" id="PenalityNature" name="PenalityNature[]" placeholder="Nature Of Penality" /> 	</div> <div class="col-md-4"> <label for="PenalityAmount">Penality Amount</label>  <input type="text" class="form-control PenalityAmount" id="PenalityAmount" name="PenalityAmount[]" placeholder="Penality Amount" /> </div> <i class="fa fa-times delete_editpenality" aria-hidden="true" delexp="0"></i><div class="clearfix"> </div></div>');
						
	}
					
			
		
});


//this is for deleting the penality

$(document).on('click','.delete_editpenality',function()
{
	if(confirm("Do you want to delete this penality"))
	{
		
		var deleted_ids = [];
			
		var delid = $(this).attr('delexp');
			delid = $.trim(delid);
		
				

		if(delid=="0")
		{
			$(this).parent().remove();	
		}
		else
		{
				$(".penality_"+delid).remove();
		}
			
	}
		
});

//update the penalities


$(document).on('click',"#update_penalities",function() 
{
		var LRNO = $("#LRNO").val();
		var SLNO = $("#SLNO").val();
		
		var updatepenalities=[];
		
		var len = $(".total_penalities").length;

		
		$(".total_penalities").each(function()
		{
			
				var ide = $(this).attr('id');
				var nature=$(this).children().children(".PenalityNature").val();
				var amount=$(this).children().children(".PenalityAmount").val();
				
				var data=	{
								"nature":nature,
								"amount":amount
							}
				
				var newarr = {
								'penalityid':ide,
								'penality':data
							 };
				
				updatepenalities.push(newarr);
			
		});
		

		
		$.ajax({
					url:base_url+"Requestdispatcher/updatepenalities",
					method:"POST",
					data:{"LRNO":LRNO,"SLNO":SLNO,'penalities':updatepenalities },
					success:function(resp)
					{
						resp = $.trim(resp);
						if(resp=="1")
						$(".penality_errmsg").html('Data updated sucessfully');
						else
						$(".penality_errmsg").html('Unable to update data');
					}
				})
		
		
		
});

//edit penalities section ends here

//edit vehicle repair section starts here


$(".addmore_editpenalities").on('click',function()
{
	var parent = $(".repairs");
	
	if( parent.children().hasClass('morerepairs') )
	{


		$(".morerepairs:last-child").after('<div class="morerepairs total_repairs Repair_0" id="0"><div class="col-md-4 " >  <label for="RepairNature">Nature Of Repair</label> <input type="text" class="form-control RepairNature"  name="RepairNature[]" placeholder="Nature of repair" /> </div>  <div class="col-md-4"> <label for="RepairAmount">Repair Amount</label><input type="text" class="form-control RepairAmount"  name="RepairAmount[]" placeholder="Repair Amount"  /></div><i class="fa fa-times delete_editrepair" aria-hidden="true" delexp="0"></i><div class="clearfix"> </div></div>');
		
	}
	else
	{

		$(".firstrepair").after('<div class="morerepairs total_repairs Repair_0" id="0"> <div class="col-md-4 " >  <label for="PenalityNature">Nature Of Repair</label>  <input type="text" class="form-control RepairNature " id="RepairNature" name="RepairNature[]" placeholder="Nature Of Repair" /> 	</div> <div class="col-md-4"> <label for="PenalityAmount">Repair Amount</label>  <input type="text" class="form-control RepairAmount" id="RepairAmount" name="RepairAmount[]" placeholder="Penality Amount" /> </div> <i class="fa fa-times delete_editrepair" aria-hidden="true" delexp="0"></i><div class="clearfix"> </div></div>');
						
	}
					
			
		
});



//edit vehicle repair section ends here

//this is for deleting the repairs

$(document).on('click','.delete_editrepair',function()
{
	if(confirm("Do you want to delete this repair"))
	{
		
		var deleted_ids = [];
			
		var delid = $(this).attr('delexp');
			delid = $.trim(delid);
		
				

		if(delid=="0")
		{
			$(this).parent().remove();	
		}
		else
		{
				$(".Repair_"+delid).remove();
		}
			
	}
		
});





//update the repairs


$(document).on('click',"#update_repairs",function() 
{
		var LRNO = $("#LRNO").val();
		var SLNO = $("#SLNO").val();
		
		var updaterepairs=[];
		
		var len = $(".total_repairs").length;

		
		$(".total_repairs").each(function()
		{
			
				var ide = $(this).attr('id');
				var nature=$(this).children().children(".RepairNature").val();
				var amount=$(this).children().children(".RepairAmount").val();
				
				var data=	{
								"nature":nature,
								"amount":amount
							}
				
				var newarr = {
								'repairid':ide,
								'repair':data
							 };
				
				updaterepairs.push(newarr);
			
		});
		

		
		$.ajax({
					url:base_url+"Requestdispatcher/updaterepairs",
					method:"POST",
					data:{"LRNO":LRNO,"SLNO":SLNO,'repairs':updaterepairs },
					success:function(resp)
					{
						resp = $.trim(resp);
						if(resp=="1")
						$(".repair_errmsg").html('Data updated sucessfully');
						else
						$(".repair_errmsg").html('Unable to update data');
					}
				})
		
		
		
});
//edit repair section ends here 





//edit expenses starts here 


$(".addmore_editexpenses").on('click',function()
{
	var parent = $(".expenses");
	
	if( parent.children().hasClass('moreexpenses') )
	{


		$(".moreexpenses:last-child").after('<div class="moreexpenses total_expenses Expense_0" id="0"><div class="col-md-4 " >  <label for="ExpenseNature">Nature Of Expense</label><input type="text" class="form-control ExpenseNature"  name="ExpenseNature[]"  placeholder="Nature of Expense"/></div><div class="col-md-4"><label for="ExpenseAmount">Amount</label><input type="text" class="form-control ExpenseAmount"  name="ExpenseAmount[]" placeholder="Amount"  /></div><i class="fa fa-times delete_editexpense" aria-hidden="true" delexp="0"></i><div class="clearfix"> </div></div>');
		
	}
	else
	{

		$(".firstexpense").after('<div class="moreexpenses total_expenses Expense_0" id="0"><div class="col-md-4 " >  <label for="ExpenseNature">Nature Of Expense</label><input type="text" class="form-control ExpenseNature"  name="ExpenseNature[]"  placeholder="Nature of Expense"/></div><div class="col-md-4"><label for="ExpenseAmount">Amount</label><input type="text" class="form-control ExpenseAmount"  name="ExpenseAmount[]" placeholder="Amount"  /></div><i class="fa fa-times delete_editexpense" aria-hidden="true" delexp="0"></i><div class="clearfix"> </div></div>');
						
	}
					
			
		
});



//edit vehicle repair section ends here

//this is for deleting the repairs

$(document).on('click','.delete_editexpense',function()
{
	if(confirm("Do you want to delete this expense"))
	{
		
		var deleted_ids = [];
			
		var delid = $(this).attr('delexp');
			delid = $.trim(delid);
		
				

		if(delid=="0")
		{
			$(this).parent().remove();	
		}
		else
		{
				$(".Expense_"+delid).remove();
		}
			
	}
		
});





//update the repairs


$(document).on('click',"#update_expenses",function() 
{
		var LRNO = $("#LRNO").val();
		var SLNO = $("#SLNO").val();
		
		var updateexpenses=[];
		
		var len = $(".total_expenses").length;

		
		$(".total_expenses").each(function()
		{
			
				var ide = $(this).attr('id');
				var nature=$(this).children().children(".ExpenseNature").val();
				var amount=$(this).children().children(".ExpenseAmount").val();
				
				var data=	{
								"nature":nature,
								"amount":amount
							}
				
				var newarr = {
								'expenseid':ide,
								'expense':data
							 };
				
				updateexpenses.push(newarr);
			
		});
		

		
		$.ajax({
					url:base_url+"Requestdispatcher/updateexpenses",
					method:"POST",
					data:{"LRNO":LRNO,"SLNO":SLNO,'expenses':updateexpenses },
					success:function(resp)
					{
						resp = $.trim(resp);
						if(resp=="1")
						$(".expense_errmsg").html('Data updated sucessfully');
						else
						$(".expense_errmsg").html('Unable to update data');
					}
				})
		
		
		
});



//edit expenses ends here 

//get the transport details of the lr

$(".lrnos").on('focus',function() { $(".lr_req").html(""); });

$(document).on('click',"#getlrdetails",function()
{
	var lrno = $(".lrnos").val()
		lrno = $.trim(lrno);
		
		$("form#payment_form")[0].reset();
		$(".chequedetails").css('display','none');
		$(".paymentsection").css('display','none');
		
	
	var err_cnt="0";
		
		if(lrno=='')
		{
			err_cnt = "1";
			$(".lr_req").html("Enter lr number");
		}
	if(err_cnt=="0")
	{
		$.ajax({
						url:base_url+"Requestdispatcher/gettransport_lrno",
						method:"POST",
						data:{"lrno":lrno},
						success:function(resp)
						{
							resp = resp.split(":::::");
							$(".transportdetails").html(resp[0]);
							$("#Totalamount").val(resp[1]);
							$("#afterdiscount").val(resp[1]);
						}
					
				});
	}
		
});


///show the payment section when user clicks on add payment

$(document).on('click',".add_payment",function() 
{ 
	$(".paymentsection").css('display','block');
});






$(document).on('click','.Cash_Cheque',function()
{
	var cash_cheque= $(this).val();
		cash_cheque = $.trim(cash_cheque);
		
		
	if(cash_cheque=="cash")
	{
			$(".chequedetails").css('display','none');
	}
	else
	{
			$(".chequedetails").css('display','block');
	}
	
});



$(document).on('keydown','#discount',function()
{
	
	var discount_in = $("#discount_in").val();
		discount_in = $.trim(discount_in);
	
	var Totalamount = $("#Totalamount").val();
		Totalamount = $.trim(Totalamount);
	
	if( discount_in=="0" || discount_in=="flat" )
	{
		$("#afterdiscount").val(Totalamount);
	}
	else
	{
			
		var discount = $("#discount").val();
				discount = $.trim(discount);
			
			discount = parseFloat(discount);
			if(discount>0)
			{
				
					
				Totalamount = parseFloat(Totalamount);
				
				if(Totalamount>0)
				{
					var discount_amount = ( (discount)/(100) )*Totalamount;
						discount_amount = parseFloat(discount_amount);
						
					Totalamount_tobepaid = ( (Totalamount)-discount_amount );

					$("#afterdiscount").val(Totalamount_tobepaid);
				}
			
			}
			else
			{
				$("#afterdiscount").val(Totalamount);
			}		
			
			
	}
	
	
});



$(document).on('change','#discount_in',function()
{
	
	var discount_in = $(this).val();
		discount_in = $.trim(discount_in);
		
	var Totalamount = $("#Totalamount").val();
		Totalamount = $.trim(Totalamount);		
		
		if( discount_in=="flat" )
		{
			$("#afterdiscount").val(Totalamount);
		}
		else if( discount_in=="pecentage" )
		{
			var discount = $("#discount").val();
				discount = $.trim(discount);
			
			discount = parseFloat(discount);
			if(discount>0)
			{
				
					
				Totalamount = parseFloat(Totalamount);
				
				if(Totalamount>0)
				{
					var discount_amount = ( (discount)/(100) )*Totalamount;
						discount_amount = parseFloat(discount_amount);
						
					Totalamount_tobepaid = ( (Totalamount)-discount_amount );

					$("#afterdiscount").val(Totalamount_tobepaid);
				}
			
			}
			else
			{
				$("#afterdiscount").val(Totalamount);
			}
		}
			
});


});