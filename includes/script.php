
   <!-- Bootstrap core JavaScript-->
   <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="js/bootstrap.password.js"></script>
    <script src="js/datatables-simple-demo.js"></script>
    <script src="js/scripts.js"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="assets/demo/    datatables-demo.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="js/  sb-admin-2.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  
    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/sweetalert.min.js"></script>
    

    <script type="text/javascript">
        
      $(document).ready(
        function() {
          $('#example').DataTable();
        });

    </script>
<script>
     var check = function() {
      if (document.getElementById('password').value ==
          document.getElementById('checkPassword').value) {
          document.getElementById('alertPassword').style.color = '#8CC63E';
          document.getElementById('alertPassword').innerHTML = '<span><i class="fas fa-check-circle"></i>Match !</span>';
      } else {
      		document.getElementById('alertPassword').style.color = '#EE2B39';
          document.getElementById('alertPassword').innerHTML = '<span><i class="fas fa-exclamation-triangle"></i>not matching</span>';
      }
  }
</script>

    <!-- Reset OTP Password -->
<script>
    const toggle = document.getElementById('togglePassword');
    const password = document.getElementById('password');

    toggle.addEventListener('click', function(){
        if(password.type === "password"){
            password.type = 'text';
        }else{
            password.type = 'password';
        }
        this.classList.toggle('bi-eye');
    });
</script>






<script>
    	var options = {
        onLoad: function () {
            $('#messages').text('Start typing password');
        },
        onKeyUp: function (evt) {
            $(evt.target).pwstrength("outputErrorList");
        }
    };
    $('#password').pwstrength(options);
</script>

<script>
$(document).ready(function(){  	
	$("#employee").change(function() {    
		var id = $(this).find(":selected").val();
		var dataString = 'empid='+ id;    
		$.ajax({
			url: 'myprofile.php',
			dataType: "json",
			data: dataString,  
			cache: false,
			success: function(empData) {
			   if(empData) {
					$("#errorMassage").addClass('hidden').text("");
					$("#recordListing").removeClass('hidden');							
					$("#empId").text(empData.id);
					$("#empName").text(empData.username);
					$("#empAge").text(empData.fname);
					$("#empSalary").text("$"+empData.email);					
				} else {
					$("#recordListing").addClass('hidden');	
					$("#errorMassage").removeClass('hidden').text("No record found!");
				}   	
			} 
		});
 	}) 
});
</script>






    <script>
function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}
</script>


    <script>
        $(document).ready(function () {

            $('.viewbtn').on('click', function () {
                $('#viewmodal').modal('show');
                $.ajax({ //create an ajax request to display.php
                    type: "GET",
                    url: "display.php",
                    dataType: "html", //expect html to be returned                
                    success: function (response) {
                        $("#responsecontainer").html(response);
                        //alert(response);
                    }
                });
            });

        });
    </script>


    <script>
        $(document).ready(function () {

            $('#datatableid').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search Your Data",
                }
            });

        });
    </script>

    <script>
        $(document).ready(function () {

            $('.deletebtn').on('click', function () {

                $('#deletemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);

            });
        });
    </script>

    <script>
        $(document).ready(function () {

            $('.editbtn').on('click', function () {

                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);
                $('#update_id').val(data[0]);
                $('#col0').val(data[1]);
                $('#col1').val(data[2]);
                $('#col2').val(data[3]);
                $('#col3').val(data[3]);
                $('#col5').val(data[4]);
                $('#col6').val(data[5]);
                $('#col7').val(data[6]);
                $('#col8').val(data[7]);
                $('#col9').val(data[8]);
                $('#col10').val(data[9]);
                $('#col11').val(data[10]);
                $('#col12').val(data[11]);
                $('#col13').val(data[12]);
                $('#col14').val(data[13]);
                $('#col15').val(data[14]);
                $('#col16').val(data[15]);
                $('#col17').val(data[16]);
                $('#col18').val(data[17]);
                $('#col19').val(data[18]);
                $('#col20').val(data[19]);
            });
        });
    </script>




<script>
		function updateUserStatus(){
			jQuery.ajax({
				url:'update_user_status.php',
				success:function(){
					
				}
			});
		}
		
		function getUserStatus(){
			jQuery.ajax({
				url:'get_user_status.php',
				success:function(result){
					jQuery('#user_grid').html(result);
				}
			});
		}
		
		setInterval(function(){
			updateUserStatus();
		},);
		
		setInterval(function(){
			getUserStatus();
		},);
	  </script>













<script>
        $(document).ready(function () {

            $('.editbtn2').on('click', function () {

                $('#editmodal2').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);
                $('#update_id').val(data[0]);
                $('#col0').val(data[1]);
                $('#col1').val(data[2]);
                $('#col2').val(data[3]);
                $('#col3').val(data[3]);
                $('#col5').val(data[4]);
                $('#col6').val(data[5]);
                $('#col7').val(data[6]);
                $('#col8').val(data[7]);
                $('#col9').val(data[8]);
                $('#col10').val(data[9]);
                $('#col11').val(data[10]);
                $('#col12').val(data[11]);
                $('#col13').val(data[12]);
                $('#col14').val(data[13]);
                $('#col15').val(data[14]);
                $('#col16').val(data[15]);
                $('#col17').val(data[16]);
                $('#col18').val(data[17]);
                $('#col19').val(data[18]);
                $('#col20').val(data[19]);
            });
        });
    </script>


<script>
    function updateDue() {

var total = parseInt(document.getElementById("totalval").value);
var val2 = parseInt(document.getElementById("inideposit").value);

// to make sure that they are numbers
if (!total) { total = 0; }
if (!val2) { val2 = 0; }

var ansD = document.getElementById("remainingval");
ansD.value = total - val2;
}
</script>



<script>
		
		var list1 = [];
		var list2 = [];
		var list3 = [];
		var list4 = [];
		var list5 = [];
        var list6 = [];
		var list7 = [];
		var list8 = [];

		var n = 1;
		var x = 0;

		function AddRow(){

			var AddRown = document.getElementById('show');
			var NewRow = AddRown.insertRow(n);

			list1[x] = document.getElementById("tab1").value;
			list2[x] = document.getElementById("tab2").value;
			list3[x] = document.getElementById("tab3").value;
			list4[x] = document.getElementById("tab4").value;
            list5[x] = document.getElementById("tab5").value;
            list6[x] = document.getElementById("tab6").value;
			list7[x] = document.getElementById("tab7").value;
			list8[x] = document.getElementById("tab8").value;
	
			var cel1 = NewRow.insertCell(0);
			var cel2 = NewRow.insertCell(1);
			var cel3 = NewRow.insertCell(2);
			var cel4 = NewRow.insertCell(3);
            var cel5 = NewRow.insertCell(4);
            var cel6 = NewRow.insertCell(5);
			var cel7 = NewRow.insertCell(6);
			var cel8 = NewRow.insertCell(7);
		
			cel1.innerHTML = list1[x];
			cel2.innerHTML = list2[x];
			cel3.innerHTML = list3[x];
			cel4.innerHTML = list4[x];
            cel5.innerHTML = list5[x];
            cel6.innerHTML = list6[x];
			cel7.innerHTML = list7[x];
			cel8.innerHTML = list8[x];


			n++;
			x++;
		}

	</script>


<script>
$(document).ready(function() {
    $("#order-sub").on("keyup",  ".form-calc",  function() {
        var parent = $(this).closest("tr");
        parent.find(".form-rem").val((parent.find(".form-qty").val() - parent.find(".form-req").val()).toFixed(2));
        var total = 0;
        $(".form-rem").each(function(){
            total += parseFloat($(this).val()||0);
        });
        $("#total").text(total.toFixed(2));
    });
});






</script>

<script>
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$("#imageUpload").change(function() {
    readURL(this);
});
</script>
<script>
        $(document).ready(function() {
    $("#order-entry").on("keyup", ".form-calc", function() {
        var parent = $(this).closest("tr");
        var total = 0;
        $(".form-calc").each(function(){
            total += parseFloat($(this).val()||0);
            var discount_perc = 0;
		if($('[name="discount_percentage"]').val() > 0){
			discount_perc = $('[name="discount_percentage"]').val()
		}
		var discount_amount = total * (discount_perc/100);
		$('[name="discount_amount"]').val(parseFloat(discount_amount).toLocaleString("en-US"))
		var tax_perc = 0
		if($('[name="tax_percentage"]').val() > 0){
			tax_perc = $('[name="tax_percentage"]').val()
		}
		var tax_amount = total * (tax_perc/100);
		$('[name="tax_amount"]').val(parseFloat(tax_amount).toLocaleString("en-US"))
        parent.find(".form-line").val(parent.find(".form-cost").val() *(parent.find(".form-qty").val()));

        });
    });
});
</script>

<script>  
$(document).ready(function(){
	
	fetch_poll_data();

	function fetch_poll_data()
	{
		$.ajax({
			url:"fetch_poll_data.php",
			method:"POST",
			success:function(data)
			{
				$('#poll_result').html(data);
			}
		});
	}
	
	$('#poll_form').on('submit', function(event){
		event.preventDefault();
		var poll_option = '';
		$('.poll_option').each(function(){
			if($(this).prop("checked"))
			{
				poll_option = $(this).val();
			}
		});
		if(poll_option != '')
		{
			$('#poll_button').attr('disabled', 'disabled');
			var form_data = $(this).serialize();
			$.ajax({
				url:"poll.php",
				method:"POST",
				data:form_data,
				success:function()
				{
					$('#poll_form')[0].reset();
					$('#poll_button').attr('disabled', false);
					fetch_poll_data();
					alert("Poll Submitted Successfully");
				}
			});
		}
		else
		{
			alert("Please Select Option");
		}
	});
	
	
	
});  
</script>