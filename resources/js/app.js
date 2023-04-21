import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const axios = window.axios;


document.addEventListener('DOMContentLoaded', function(){
   const playGameButton = document.getElementById('Imfeelinglucky');
   const showHistoryButton = document.getElementById('game_history_bnt');

   playGameButton.addEventListener('click', playGame)
   showHistoryButton.addEventListener('click', getGameHistory)
});


function getGameHistory() {
    let html = ``;

    axios.get('/api/game/history')
        .then(({ data }) => {
            data.forEach(function (item) {
                html += `<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Число: ${item.number}
                    Результат: ${item.status}
                    Cумма выиграша: ${item.win_sum}
                </div>
            </div>`
            })
            document.getElementById('game_history_wrap').innerHTML = html
        })
}

function playGame() {
    document.getElementById('game_wrap').style.display = 'block';

    const numNode = document.getElementById('game_num');
    const sumNode = document.getElementById('game_sum');
    const resNode = document.getElementById('game_res');

    axios.get('/api/game/play')
        .then(({ data }) => {
            numNode.innerText = data.number;
            sumNode.innerText = data.win_sum;
            resNode.innerText = data.status;
        })
}
