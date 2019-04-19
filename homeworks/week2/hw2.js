function capitalize(str) {

  if(str.charCodeAt(0)>=97 || str.charCodeAt(0)<=122 ){
    str = str[0].toUpperCase() + str.slice(1,str.length)   
  } 
  
  return str;
}

console.log(capitalize(',hello'));
