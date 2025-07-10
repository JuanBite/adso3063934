$(function(){

    //Ckeck localStorage
    if(localStorage.getItem('todolist') != null){
        $('.list').html(localStorage.getItem('todolist'))
        countTasks()
        countRemains()

    } else {
        //count Tasks and Remains
        countTasks()
        countRemains()
    }

    //add tasks
    $('footer').on('click', '#add', function(){
        if($('#input-task').val().length > 0){
            
            $task = '<article> \
                        <input type="checkbox">\
                        <p>'+$('#input-task').val()+'</p>\
                        <button>&times;</button>\
                    </article>'
            $('section.list').append($task)
            $('#input-task').val('')
            countTasks()
            countRemains()
        } else {
            alert('Please! Enter a Task');
        }
    })
    //Toggle Task (Remain or Done)
    $('body').on('click', 'input[type="checkbox"]', function(){
        //if checked
        if ($(this).prop('checked')){
            $(this).attr('checked', true)
            $(this).parent().addClass('checked')
        }else{
            $(this).attr('checked', false)
            $(this).parent().removeClass('checked')
        }
        countRemains()
    })
    //Remove Task
    $('body').on('click', 'article button', function() {
        $(this).closest('article').remove()
        countTasks()
        countRemains()
    })
    $('body').on('click', '#reset', function(){
        localStorage.setItem('todolist', $('.list').html(''))
        countTasks()
        countRemains()
    })
})
// Count Tasks
function countTasks(){
    $('.num-tasks').text($('article').length)
    $('.title-tasks').text($('article').length > 1 ? 'Tasks' : 'Task')
}
//count Remains
function countRemains(){
    $remain = Math.abs($('.checked').length - $('article').length)
    $('.num-remains').text($remain)
    $('.title-remains').text($remain >1 ? 'Remains' : 'Remain')
    // set localStorage
    localStorage.setItem('todolist', $('.list').html())
}
 class MemoryGame {
            constructor() {
                this.cards = [];
                this.flippedCards = [];
                this.matchedPairs = 0;
                this.gameActive = false;
                this.totalPairs = 8; // Fijo en 4x4 = 16 cartas = 8 parejas
                
                this.emojis = [
                    '🎮', '🎯', '🎪', '🎨', '🎭', '🎲', '🎸', '🎹', 
                    '🎺', '🎻', '🎤', '🎧', '🎬', '🚀', '⚽', '🏀',
                    '🏈', '🎾', '🏐', '🏓', '🏸', '🥊', '🎳', '🎯'
                ];
                
                this.initializeGame();
            }

            initializeGame() {
                this.createBoard();
                this.bindEvents();
            }

            createBoard() {
                const totalCards = 16; // 4x4 fijo
                const pairsNeeded = 8;
                
                // Crear parejas de cartas
                this.cards = [];
                for (let i = 0; i < pairsNeeded; i++) {
                    const emoji = this.emojis[i % this.emojis.length];
                    this.cards.push(emoji, emoji);
                }
                
                // Mezclar cartas
                this.shuffleArray(this.cards);
                
                // Crear el tablero HTML
                const gameBoard = $('#gameBoard');
                gameBoard.empty();
                gameBoard.css('grid-template-columns', 'repeat(4, 1fr)');
                
                this.cards.forEach((emoji, index) => {
                    const cardElement = $(`
                        <div class="card" data-index="${index}" data-emoji="${emoji}">
                            ?
                        </div>
                    `);
                    gameBoard.append(cardElement);
                });
            }

            shuffleArray(array) {
                for (let i = array.length - 1; i > 0; i--) {
                    const j = Math.floor(Math.random() * (i + 1));
                    [array[i], array[j]] = [array[j], array[i]];
                }
            }

            bindEvents() {
                $(document).off('click', '.card');
                $(document).on('click', '.card', (e) => {
                    this.handleCardClick($(e.currentTarget));
                });
            }

            handleCardClick(cardElement) {
                if (!this.gameActive) {
                    this.gameActive = true;
                }
                
                const index = parseInt(cardElement.data('index'));
                
                // Verificar si la carta ya está volteada o emparejada
                if (cardElement.hasClass('flipped') || cardElement.hasClass('matched')) {
                    return;
                }
                
                // Verificar si ya hay 2 cartas volteadas
                if (this.flippedCards.length >= 2) {
                    return;
                }
                
                // Voltear la carta
                const emoji = cardElement.data('emoji');
                cardElement.addClass('flipped');
                cardElement.text(emoji);
                this.flippedCards.push({ element: cardElement, index: index, value: emoji });
                
                // Verificar si hay 2 cartas volteadas
                if (this.flippedCards.length === 2) {
                    setTimeout(() => {
                        this.checkMatch();
                    }, 1000);
                }
            }

            checkMatch() {
                const [card1, card2] = this.flippedCards;
                
                if (card1.value === card2.value) {
                    // Es una pareja
                    card1.element.removeClass('flipped').addClass('matched');
                    card2.element.removeClass('flipped').addClass('matched');
                    this.matchedPairs++;
                    
                    // Verificar si el juego terminó
                    if (this.matchedPairs === 8) {
                        this.endGame();
                    }
                } else {
                    // No es pareja, voltear de vuelta
                    card1.element.removeClass('flipped').text('?');
                    card2.element.removeClass('flipped').text('?');
                }
                
                this.flippedCards = [];
            }

            endGame() {
                this.gameActive = false;
                
                $('#finalStats').html('<strong>¡Completaste el juego!</strong>');
                
                $('#overlay').fadeIn();
                $('#winMessage').fadeIn();
            }

            newGame() {
                this.resetGame();
                this.createBoard();
            }

            resetGame() {
                this.gameActive = false;
                this.flippedCards = [];
                this.matchedPairs = 0;
            }
        }

        // Instancia global del juego
        let game;

        $(document).ready(function() {
            game = new MemoryGame();
        });

        function newGame() {
            game.newGame();
        }

        function resetGame() {
            game.resetGame();
        }

        function closeWinMessage() {
            $('#overlay').fadeOut();
            $('#winMessage').fadeOut();
        }

