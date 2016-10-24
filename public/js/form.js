function reset(id1,id2) {

    //document.getElementById(id1).setAttribute('value', '');
    var attr1 = document.getElementById(id1).value;
    var attr2 = document.getElementById(id2).value;
    if(attr1!=attr2){
        document.getElementById(id1).setAttribute('value', '');
        document.getElementById(id2).setAttribute('value', '');
    }


}
