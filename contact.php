<?php
include("HF/header.php");
?>

<div class="container">
	<link rel="stylesheet" type="text/css" href="public/css/contact.css">
	<div class="container contact-info">
		<h3 class="text-center">FIND US HERE</h3>
		<div class="row">
			<div class="col-md-3 company-address">
				<h4>Address</h4>
				<p>239 Luong Nhu Hoc street, Ward 12, District 5, Ho Chi Minh city</p>
				<p>Free Phone: 035 489 6372</p>
				<p>Telephone: 000 000 0000</p>
				<p>Email: LibertyElectronics@gmail.com</p>
			</div>
			<div class="col-md-9">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d346.4582082551512!2d106.65995023811277!3d10.755497272034939!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ef17353a321%3A0xe5e32c4cb67da835!2zMjM5IEzGsMahbmcgTmjhu68gSOG7jWMsIFBoxrDhu51uZyAxMiwgUXXhuq1uIDUsIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1543238705655" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>            
			</div>
		</div>
	</div>
	<div class="container contact">
		<h3 class="text-center">CONTACT FORM</h3>
		<form action="#" class="form-horizontal" id="contact-form">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label class="col-md-2" for="name">Name: </label>
						<div class="col-md-10">
							<input type="text" class="form-control" id="name" placeholder="Name">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2" for="email">Email: </label>
						<div class="col-md-10">
							<input type="email" class="form-control" id="email" placeholder="Your Email">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2" for="subject">Subject: </label>
						<div class="col-md-10">
							<input type="text" id="subject" class="form-control" placeholder="Subject" >
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="opinion" class="col-md-2">Opinion: </label>
						<div class="col-md-10">
							<textarea class="form-control" id="opinion" cols="30" rows="6" placeholder="Please contribute your opinion in here"></textarea>
						</div>
					</div>
				</div>
			</div>
			<input type="button" value="SUBMIT" id="btn_submit" class="btn btn-warning"/>
		</form>
	</div>

</div>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script>
	$(document).ready(function(){
		$('#btn_submit').click(function(e){
			e.preventDefault();
			var data = [];
			data[0] = $("#name").val();
			data[1] = $("#email").val();
			data[2] = $("#subject").val();
			data[3] = $("#opinion").val();
			console.log(data);
			for(i = 0; i < data.length; i++)
			{
				if(data[i] == null || data[i] == ''){
					Swal.fire({
						type: 'error',
						title: 'Oops...',
						text: 'Something went wrong!',
						footer: '<a href>Why do I have this issue?</a>'
					})
					return false;
				}
			}

			$.ajax({
				url : 'controller/ContactController.php',
				type : 'POST' ,
				dataType: "json",
				data : {
					name: data[0],
					email: data[1],
					subject: data[2],
					opinion: data[3]
				},

			}).done(function(ketqua){
				console.log(typeof ketqua['status']);
				
				if(ketqua.hasOwnProperty('status') && ketqua['status'] == 'success'){
					Swal.fire(
						'Thank you!',
						'Chúng tôi sẽ sớm liên lạc lại với bạn!',
						'success'
						)		
				}
				else{
					Swal.fire({
						type: 'error',
						title: 'Oops...',
						text: 'Something went wrong!',
						footer: '<a href>Why do I have this issue?</a>'
					})
					// alert("hello");
				}

			}).fail(function(jqXHR, textStatus, errorThrown){
				console.log(textStatus + ': ' + errorThrown);
			});
			
		})    
	})
</script>
<?php
include("HF/footer.php");
?>