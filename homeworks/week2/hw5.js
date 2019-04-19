function join(str, concatStr) {
  
  var paste = str[0]

  for(i=1 ; i<str.length ; i++){
    paste = paste + concatStr+str[i]
  }
  
  return paste;
}



function repeat(str, times) {

  var str_rep = ''
  for( var i=1 ; i<=times ; i++){
    str_rep =  str_rep + str
  }

  return str_rep;
}

console.log(join('a', '!'));
console.log(repeat('a', 5));
