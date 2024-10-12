let playerMoney = 5000; // Awal uang pemain
let betAmount = 0;
let deck = [],
  playerHand = [],
  dealerHand = [],
  gameOver = false;

const playerHandElement = document.getElementById("player-hand");
const dealerHandElement = document.getElementById("dealer-hand");
const playerHandValueElement = document.getElementById("player-hand-value");
const dealerHandValueElement = document.getElementById("dealer-hand-value");
const resultMessageElement = document.getElementById("result-message");
const playerMoneyElement = document.getElementById("player-money");
const playerSumElement = document.getElementById("player-sum");
const dealerSumElement = document.getElementById("dealer-sum");
const betInputElement = document.getElementById("bet-amount");
const takeCardButton = document.querySelector(".take-card");
const holdCardButton = document.querySelector(".hold-card");

const suits = ["H", "D", "C", "S"];
const values = [
  "2",
  "3",
  "4",
  "5",
  "6",
  "7",
  "8",
  "9",
  "10",
  "J",
  "Q",
  "K",
  "A",
];

function createDeck() {
  deck = [];
  for (let suit of suits) {
    for (let value of values) {
      deck.push({ value, suit });
    }
  }
}

function shuffleDeck() {
  for (let i = deck.length - 1; i > 0; i--) {
    const j = Math.floor(Math.random() * (i + 1));
    [deck[i], deck[j]] = [deck[j], deck[i]];
  }
}

function newGame() {
    createDeck();
    shuffleDeck();
    
    
    playerHand = [drawCard(), drawCard()];
    dealerHand = [drawCard(), drawCard()]; // Dealer hanya mendapatkan dua kartu
    gameOver = false;

    updateUI();

    betAmount = parseInt(betInputElement.value) || 0;
  
    if (betAmount < 100 || betAmount > playerMoney) {
        alert("Taruhan minimal $100 dan tidak bisa melebihi uang yang tersisa.");
        return;
    }
  
    takeCardButton.disabled = false;
    holdCardButton.disabled = false;
  
    resultMessageElement.textContent = "";
    resultMessageElement.classList.remove("win", "lose", "draw");
}


function drawCard() {
  return deck.pop();
}

function calculateHandValue(hand) {
  let total = 0;
  let aceCount = 0;

  for (let card of hand) {
    if (card.value === "A") {
      total += 11;
      aceCount++;
    } else if (["J", "Q", "K"].includes(card.value)) {
      total += 10;
    } else {
      total += parseInt(card.value);
    }
  }

  while (total > 21 && aceCount > 0) {
    total -= 10;
    aceCount--;
  }

  return total;
}

function updateUI() {
    playerHandElement.innerHTML = "";
    dealerHandElement.innerHTML = "";
  
    // Tampilkan kartu player
    playerHand.forEach((card) =>
        playerHandElement.appendChild(createCardElement(card))
    );
  
  
    dealerHandElement.appendChild(createHiddenCardElement()); // Kartu hole
    dealerHandElement.appendChild(createCardElement(dealerHand[1])); // Kartu upcard
  
    playerHandValueElement.textContent = `[${calculateHandValue(playerHand)}]`;
    dealerHandValueElement.textContent = `[${
        gameOver ? calculateHandValue(dealerHand) : "6+?"
    }]`;
  
    playerSumElement.textContent = calculateHandValue(playerHand);
    dealerSumElement.textContent = gameOver
        ? calculateHandValue(dealerHand)
        : "?";
}

  
function createCardElement(card) {
    const cardElement = document.createElement('img');
    // Untuk kartu 10, format nama file adalah 10-C.png, 10-D.png, 10-H.png, 10-S.png
    cardElement.src = `cards/${card.value}-${card.suit}.png`;
    cardElement.alt = `${card.value} of ${card.suit}`;
    return cardElement;
}


function createHiddenCardElement() {
    const cardElement = document.createElement('img');
   
    cardElement.src = `cards/BACK.png`;
    cardElement.alt = 'Hidden Card';
    return cardElement;
}

function hit() {
  if (!gameOver) {
    playerHand.push(drawCard());
    if (calculateHandValue(playerHand) > 21) {
      endGame(false);
    }
    updateUI();
  }
}

function stand() {
  if (!gameOver) {
    while (calculateHandValue(dealerHand) < 17) {
      dealerHand.push(drawCard());
    }
    const playerTotal = calculateHandValue(playerHand);
    const dealerTotal = calculateHandValue(dealerHand);
    const playerWins = playerTotal > dealerTotal || dealerTotal > 21;
    const draw = playerTotal === dealerTotal;
    endGame(playerWins, draw);
  }
}

function endGame(playerWins, draw) {
    gameOver = true;
    takeCardButton.disabled = true;
    holdCardButton.disabled = true;
    updateUI();

    // Menampilkan semua kartu dealer
    dealerHandElement.innerHTML = ""; 
    dealerHand.forEach((card) => {
        dealerHandElement.appendChild(createCardElement(card)); // Tampilkan semua kartu dealer
    });

    let modalMessage = "";
    if (playerWins) {
        playerMoney += betAmount *2;
        modalMessage = "~ You won!";
    } else if (draw) {
        modalMessage = "~ Draw!";
    } else {
        playerMoney -= betAmount;
        modalMessage = "~ You lost!";
    }

    playerMoneyElement.textContent = playerMoney;
    document.getElementById("modal-message").textContent = modalMessage;

    // Tampilkan modal
    document.getElementById("result-modal").style.display = "block";

    if (playerMoney <= 0) {
        document.getElementById("modal-message").textContent =
            "Game Over! Uang kamu habis.";
        document.querySelector(".start-game").disabled = true;
    }
}



document.getElementById("close-modal").addEventListener("click", function () {
  document.getElementById("result-modal").style.display = "none";
});
window.onclick = function (event) {
  if (event.target == document.getElementById("result-modal")) {
    document.getElementById("result-modal").style.display = "none";
  }
};

document.querySelector(".start-game").addEventListener("click", newGame);
takeCardButton.addEventListener("click", hit);
holdCardButton.addEventListener("click", stand);

newGame();
