// Game state
let board = ['', '', '', '', '', '', '', '', ''];
let currentPlayer = 'X';
let gameActive = true;

// Winning combinations
const winningCombinations = [
    [0, 1, 2], [3, 4, 5], [6, 7, 8], // rows
    [0, 3, 6], [1, 4, 7], [2, 5, 8], // columns
    [0, 4, 8], [2, 4, 6] // diagonals
];

// DOM elements
const boardElement = document.getElementById('board');
const statusElement = document.getElementById('status');
const resetBtn = document.getElementById('reset-btn');
const cells = document.querySelectorAll('.cell');

// Initialize game
function initGame() {
    board = ['', '', '', '', '', '', '', '', ''];
    currentPlayer = 'X';
    gameActive = true;
    statusElement.textContent = "Player X's turn";
    cells.forEach(cell => {
        cell.textContent = '';
        cell.classList.remove('marked');
    });
}

// Handle cell click
function handleCellClick(event) {
    const cell = event.target;
    const index = parseInt(cell.getAttribute('data-index'));

    if (board[index] !== '' || !gameActive) {
        return;
    }

    // Mark cell
    board[index] = currentPlayer;
    cell.textContent = currentPlayer;
    cell.classList.add('marked');

    // Check for win or draw
    if (checkWin()) {
        gameActive = false;
        statusElement.textContent = `Player ${currentPlayer} wins!`;
    } else if (checkDraw()) {
        gameActive = false;
        statusElement.textContent = "It's a draw!";
    } else {
        // Switch player
        currentPlayer = currentPlayer === 'X' ? 'O' : 'X';
        statusElement.textContent = `Player ${currentPlayer}'s turn`;
    }
}

// Check for win
function checkWin() {
    for (let combination of winningCombinations) {
        const [a, b, c] = combination;
        if (board[a] && board[a] === board[b] && board[a] === board[c]) {
            return true;
        }
    }
    return false;
}

// Check for draw
function checkDraw() {
    return board.every(cell => cell !== '');
}

// Reset game
function resetGame() {
    initGame();
}

// Event listeners
resetBtn.addEventListener('click', resetGame);
cells.forEach(cell => {
    cell.addEventListener('click', handleCellClick);
});

// Initialize on load
initGame();
