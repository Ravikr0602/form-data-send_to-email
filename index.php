<!DOCTYPE html>
<html>
<head>
<title>Send an Email</title>
</head>
<style>
input, textarea{
  margin-top: 10px;
  width: 50%;
  padding: 12px 20px;
  margin: 18px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

button[type=button] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button[type=button]:hover {
  background-color: #45a049;
}

form {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  margin-top:10px;
  width:700px;
  height:640px;
  margin-left:300px;
  border:2px solid green;
  border-radius:25px;
} 


</style>
<body>

<div class="fom">
<h4 class="sent-notification"></h4>

<form id="myform">
<h2>Send your message </h2>

<label>Username</label>
<input id="name" type="text" placeholder="Enter Your Name">
<br><br>
<label> Email</label>
<input id="email" type="text" placeholder="Enter Your Email">
<br><br>
<label>Subject</label>
<input id="subject" type="text" placeholder="Enter Your Subject">
<br><br>
<p> Message</p>
<textarea id="body" rows="5" placeholder="Type Your Message"></textarea>
<br><br>
<button type="button" onclick="sendEmail()" value="Send an Email">Submit</button>

</form>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script type="text/javascript">



function sendEmail()
{
    var name= $("#name");
    var email= $("#email");
    var subject= $("#subject");
    var body= $("#body");

    if(isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(subject) && isNotEmpty(body))
    {
        $.ajax(
            {
                url:'emailsend.php',
                method: 'POST',
                dataType: 'json',
                data:{
                    name: name.val(),
                    email: email.val(),
                    subject: subject.val(),
                    body: body.val()
                }, success: function(response)
                {
                    $('#myform')[0].reset();
                    $('.sent-notification').text("Your Message sent successfully.");
                }
            });
    }
}
function isNotEmpty(caller){
    if(caller.val()==""){
        caller.css('border','1px solid red');
        return false;
    }
    else
    {
        caller.css('border', '');
        return true;
    }
}
</script>
</body>
</html>
