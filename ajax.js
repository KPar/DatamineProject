/**
 * Created by Ken on 21/09/2015.
 */
var xhr = createRequest();
function getData(dataSource, divID)  {
    if(xhr) {
        var place = document.getElementById(divID);
        xhr.open("GET", "DBcon.php", true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                place.innerHTML = xhr.responseText;
            } // end if
        } // end anonymous call-back function
        xhr.send(null);
    } // end if
} // end function getData()