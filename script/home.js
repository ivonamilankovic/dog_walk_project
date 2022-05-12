'use strict';

const findWalkersBtn = document.querySelectorAll('.findWalkers');

findWalkersBtn.forEach((btn)=>{
    btn.addEventListener('click', ()=>{
        document.location = './allWalkers.php';
    });
});

//SEARCH

const searchInput = document.getElementById('searchInput');
const searchBtn = document.getElementById('searchWalkersBtn');

//event listener
searchBtn.addEventListener('click', ()=>{
    if(searchInput.value!== "")
        document.location = '../pages/allWalkers.php?name='+searchInput.value;
    else
        document.location = '../pages/allWalkers.php';
});
searchInput.addEventListener('keyup', (event)=> {
    if (event.keyCode === 13) {
        event.preventDefault();
        searchBtn.click();
    }
});
