function cargarHuecas() {
    document.getElementById("table").innerHTML = "";
    if (str == "") {
      
      return;
    } else {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          document.getElementById("txtHint").innerHTML = this.responseText;
        }
      };
      xmlhttp.open("GET","getuser.php?q="+str,true);
      xmlhttp.send();
    }
  }