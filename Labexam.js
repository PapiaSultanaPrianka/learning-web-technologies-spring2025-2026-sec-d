let cells = document.querySelectorAll(".cell");
let statusText = document.getElementById("status");
let resetBtn = document.getElementById("reset");

let currentPlayer = "X";
let gameActive = true;

let board = ["","","","","","","","",""];

let winPatterns = [
[0,1,2],
[3,4,5],
[6,7,8],
[0,3,6],
[1,4,7],
[2,5,8],
[0,4,8],
[2,4,6]
];

cells.forEach((cell,index)=>{
    cell.addEventListener("click",function(){
        handleClick(cell,index);
    });
});

function handleClick(cell,index){

    if(board[index] !== "" || !gameActive){
        return;
    }

    board[index] = currentPlayer;
    cell.textContent = currentPlayer;

    checkWinner();

    if(gameActive){
        currentPlayer = currentPlayer === "X" ? "O" : "X";
        statusText.textContent = "Player " + currentPlayer + " Turn";
    }
}

function checkWinner(){

    for(let pattern of winPatterns){

        let a = pattern[0];
        let b = pattern[1];
        let c = pattern[2];

        if(board[a] !== "" &&
           board[a] === board[b] &&
           board[b] === board[c]){

            gameActive = false;

            cells[a].classList.add("win");
            cells[b].classList.add("win");
            cells[c].classList.add("win");

            statusText.textContent = "Player " + currentPlayer + " Wins!";
            return;
        }
    }

    if(!board.includes("")){
        gameActive = false;
        statusText.textContent = "It's a draw!";
    }
}

resetBtn.addEventListener("click",resetGame);

function resetGame(){

    board = ["","","","","","","","",""];
    currentPlayer = "X";
    gameActive = true;

    statusText.textContent = "Player X Turn";

    cells.forEach(cell=>{
        cell.textContent="";
        cell.classList.remove("win");
    });
}