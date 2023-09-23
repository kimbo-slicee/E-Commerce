
let moin=document.getElementById('moin');
let plus=document.getElementById('plus');
let Qnt=document.getElementById('Qnt');
let counter=0
moin.addEventListener('click',()=>{
    if(+(Qnt.value)===0){
    Qnt.value=0
    }else{
    counter-=1;
    Qnt.value=counter 

    }
})
plus.addEventListener('click',()=>{
        counter+=1;
        Qnt.value=counter

})
