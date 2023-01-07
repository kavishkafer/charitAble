const inputs = document.querySelectorAll(' input');

function focusFunc(){
    let parent = this.parentNode.parentNode;
    parent.classList.add('focus');
}
function blurFunc(){
    let parent = this.parentNode.parentNode;
    if(this.value==""){
        parent.classList.remove('focus');
    }
}


inputs.forEach(input=> {
    input.addEventListener('focus', focusFunc);
    input.addEventListener('blur', blurFunc);


});


google.maps.event.AddDomListner(window,'load',intilize);
function intilize(){
    var autocomplete= new google.maps.places.Autocomplete(document.getElementById('textautocomplete'));
    google.maps.events.AddListner(autocomplete,'plac_changed',function(){
        var places=autocomplete.getPlace();
        var location="<b>Location</b>:"+places.formatted_address+"<br/>";
        location+="<b>Latitude</b>:"+places.geometry.location.A()+"<br/>";
        location+="<b>Longitude</b>:"+places.geometry.location.F()+"<br/>";
    });
    document.getElementById('lblresult').innerHTML=location;
}