'use strict';

const findWalkersBtn = document.querySelectorAll('.findWalkers');

findWalkersBtn.forEach((btn)=>{
    btn.addEventListener('click', ()=>{
        document.location = './allWalkers.php';
    });
});
