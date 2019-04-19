function reverse(str) {

  var str_rev = ""

  for(var i =str.length-1 ; i >=0 ; i--){
    str_rev = str_rev+ str[i]
  }

  console.log(str_rev);
}

reverse('hello');
