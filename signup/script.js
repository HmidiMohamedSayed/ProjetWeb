function myFunction() {

  let checkbox = document.getElementById("worker");
  let select= document.getElementById("select-service");

  select.style.visibility = "hidden";
  
  checkbox.addEventListener("click",()=>{
    if (checkbox.checked==true){
      select.style.visibility = "visible";
    }
    else{
      select.style.visibility = "hidden";
  }});
    
   
  };
myFunction();