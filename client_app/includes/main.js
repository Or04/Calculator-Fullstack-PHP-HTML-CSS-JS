$("#put").click(function ()
 {
    // PUT:
    var dataObj = {'func':'multi', 'num1':10, 'num2':15, 'num3':20};
    $.ajax({
        url:'../service_calculator/calc.php',
        data:dataObj,
        type:'PUT',
        success: function(data)
        {
            $(".result").append(data.retVal);
            console.log("Return data: " + data.retVal);
        }
    });
 });

$("#get").click(function () 
{
    // GET:
    
    $.get("../service_calculator/calc.php?func=sum&num1=10&num2=15&num3=20",
    function( data )
     {
        $(".result").append(data.retVal + "<br>");
        console.log( "Return data: " + data.retVal);
    });
});

  $("#post").click(function () 
  {
    // POST:
    
    $.post("../service_calculator/calc.php",
    {func:"avg",num1:10,num2:15,num3:20},
    function( data ) 
    {
    $(".result").append(data.retVal + "<br>");
    console.log( "Return data: " + data.retVal );
    });
 });

  