function getBackColor() {
        var checkBox = document.getElementById("l");
        var x = document.getElementsByTagName("body")[0];
        var y = document.getElementById("header");

            if(checkBox.checked == true){
                x.setAttribute("id", "day"); 
            }
            else {
                x.setAttribute("id", "night"); 
            }
        }
