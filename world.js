window.onload=function(){
    var lookup= document.getElementById("lookup");

    lookup.addEventListener("click",(e)=>{
        e.preventDefault();
		var input = document.getElementById("country").value;
        //var url= "http://localhost:8080/world.php " + "?country=" + input;
        var url= "http://localhost/info2180-lab5/world.php" + "?country=" + input;
        var httpRequest= new XMLHttpRequest();
        httpRequest.onreadystatechange= display();
        httpRequest.open("GET",url);
        httpRequest.send();

        function display(){
            if(httpRequest.readyState===XMLHttpRequest.DONE){
                if(httpRequest.status===200){
                    var response= httpRequest.responseText;
                    var result=document.getElementById("result");
                    result.innerHTML=response;
                }else{
                    alert("There was a problem with this request");
                }
            }
        }
    });

}