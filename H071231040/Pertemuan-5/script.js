let botSums = 0;
let mySums = 0;

let botASCards = 0;
let myASCards = 0;

let cards;
let isCanHit = true;

const startGameButton = document.getElementById("btn-start-game");
const takeCardButton = document.getElementById("btn-take");
const holdCardsButton = document.getElementById("btn-hold");

const mySumsElement = document.getElementsByClassName("my-sums")[0];
const myCardsElement = document.getElementsByClassName("my-cards")[0];
const myMoney = document.getElementById("my-money");
const inputMoney = document.getElementsByTagName("input")[0];

let botSumsElement = document.getElementsByClassName("bot-sums")[0];
const botCardsElement = document.getElementsByClassName("bot-cards")[0];

window.onload = () => {
    buildUserCards();
    shuffleCards();
    takeCardButton.setAttribute("disabled", true);
    holdCardsButton.setAttribute("disabled", true);
};

function buildUserCards() {
    let cardTypes = ["H", "D", "S", "C"];
    let cardValues = [
        "A",
        "2",
        "3",
        "4",
        "5",
        "6",
        "7",
        "8",
        "9",
        "10",
        "K",
        "Q",
        "J",
    ];
    cards = [];

    for (let i = 0; i < cardTypes.length; i++) {
        for (let j = 0; j < cardValues.length; j++) {
            cards.push(cardValues[j] + "-" + cardTypes[i]);
        }
    }
}

function shuffleCards() {
    for (let i = 0; i < cards.length; i++) {
        let randomNum = Math.floor(Math.random() * cards.length);
        let temp = cards[i];
        cards[i] = cards[randomNum];
        cards[randomNum] = temp;
    }
}

startGameButton.addEventListener("click", function () {
    var bet = parseInt(document.getElementById("bet-input").value);
    var myMoney = parseInt(document.getElementById("my-money").textContent);

    if (startGameButton.textContent === "BET AGAIN") {
        botSums = 0;
        mySums = 0;
        botASCards = 0;
        myASCards = 0;
        isCanHit = true;
        message = "";

        botSumsElement.textContent = "";
        mySumsElement.textContent = "";

        document.getElementById("btn-take").classList.remove("button-disabled");
        document.getElementById("btn-hold").classList.remove("button-disabled");

        const allCardsImage = document.querySelectorAll("img");
        for (let i = 0; i < allCardsImage.length; i++) {
            allCardsImage[i].remove();
        }

        let cardImg = document.createElement("img");
        cardImg.src = "/LAB-WEB-08-2024/H071231040/Pertemuan-5/RDR2 Poker Card/Back-card.png";
        cardImg.className = "hidden-card";
        botCardsElement.append(cardImg);

        buildUserCards();
        shuffleCards();
    }

    if (isNaN(myMoney)) {
        // Mengatasi NaN jika myMoney sebelumnya bukan angka
        myMoney = 5000;
        myMoney.textContent = myMoney;

        if (bet <= 0 || bet > myMoney) {
            alert("Please enter a valid bet amount");
            return;
        }
    }

    if (myMoney <= 0 || bet > myMoney || bet <= 0) {
        alert("Please enter a valid bet amount");
        return;
    }

    document.getElementById("my-money").textContent = myMoney;

    takeCardButton.disabled = false;
    holdCardsButton.disabled = false;
    startGameButton.textContent = "BET AGAIN";
    startGameButton.setAttribute("disabled", true);

    for (let i = 0; i < 2; i++) {
        let cardImg = document.createElement("img");
        let card = cards.pop();
        cardImg.src = `/LAB-WEB-08-2024/H071231040/Pertemuan-5/RDR2 Poker Card/${card}.png`;
        mySums += getValueOfCard(card);
        myASCards += checkASCard(card);
        mySumsElement.textContent = mySums;
        myCardsElement.append(cardImg);
    }

    document.getElementById("my-money").textContent = myMoney - inputMoney.value;
    document.getElementById("info-bet").textContent = inputMoney.value;
    document.getElementById("info-prize").textContent = inputMoney.value * 2;
});

takeCardButton.addEventListener("click", function () {
    if (!isCanHit) return;

    let cardImg = document.createElement("img");
    let card = cards.pop();
    cardImg.src = `/LAB-WEB-08-2024/H071231040/Pertemuan-5/RDR2 Poker Card/${card}.png`;
    mySums += getValueOfCard(card);
    myASCards += checkASCard(card);
    mySumsElement.textContent = mySums;
    myCardsElement.append(cardImg);

    if (reduceASCardValue(mySums, myASCards) > 21) isCanHit = false;

    if (mySums > 21) {
        takeCardButton.disabled = true;
        holdCardsButton.disabled = true;
        startGameButton.disabled = false;

        if (parseInt(myMoney.textContent) <= 0) {
            setTimeout(function() {
                document.getElementById("outofmoney-celebration").style.display = "flex";
            }, 500);
            setTimeout(function() {
                const outofmoneycelebration = document.getElementById("outofmoney-celebration");
                outofmoneycelebration.style.opacity = "0";
                setTimeout(function() {
                    outofmoneycelebration.style.display = "none"; 
                    outofmoneycelebration.style.opacity = "1"; 
                    location.reload();
                }, 600); 
            }, 4000);
        } else {
            setTimeout(function() {
                document.getElementById("lose-celebration").style.display = "flex";
            }, 500);
            setTimeout(function() {
                const losecelebration = document.getElementById("lose-celebration");
                losecelebration.style.opacity = "0";
                setTimeout(function() {
                    losecelebration.style.display = "none"; 
                    losecelebration.style.opacity = "1";
                    resetGame();
                }, 600); 
            }, 4000);
        }
    }
});

holdCardsButton.addEventListener("click", function () {
    setTimeout(() => {
        document.getElementsByClassName("hidden-card")[0].remove();
    }, 1000);

    const addBotCards = () => {
        setTimeout(() => {
            let cardImg = document.createElement("img");
            let card = cards.pop();
            cardImg.src = `/LAB-WEB-08-2024/H071231040/Pertemuan-5/RDR2 Poker Card/${card}.png`;
            botSums += getValueOfCard(card);
            botASCards += checkASCard(card);
            botCardsElement.append(cardImg);
            botSumsElement.textContent = botSums;

            if (botSums < 18) {
                addBotCards();
            } else {
                botSums = reduceASCardValue(botSums, botASCards);
                mySums = reduceASCardValue(mySums, myASCards);
                isCanHit = false;

                let message = "";
                if (mySums > 21 || mySums % 22 < botSums % 22) {
                    if (parseInt(myMoney.textContent) <= 0) {
                        setTimeout(function() {
                            document.getElementById("outofmoney-celebration").style.display = "flex";
                        }, 500);
                        setTimeout(function() {
                            const outofmoneycelebration = document.getElementById("outofmoney-celebration");
                            outofmoneycelebration.style.opacity = "0";
                            setTimeout(function() {
                                outofmoneycelebration.style.display = "none"; 
                                outofmoneycelebration.style.opacity = "1"; 
                                location.reload();
                            }, 600); 
                        }, 4000);
                    } else {
                        setTimeout(function() {
                            document.getElementById("lose-celebration").style.display = "flex";
                        }, 500);
                        setTimeout(function() {
                            const losecelebration = document.getElementById("lose-celebration");
                            losecelebration.style.opacity = "0";
                            setTimeout(function() {
                                losecelebration.style.display = "none"; 
                                losecelebration.style.opacity = "1";
                                resetGame();
                            }, 600); 
                        }, 4000);
                    }
                    
                } else if (botSums > 21 || mySums % 22 > botSums % 22) {
                    setTimeout(function() {
                        document.getElementById("win-celebration").style.display = "flex";
                    }, 500);
                    setTimeout(function() {
                        const wincelebration = document.getElementById("win-celebration");
                        wincelebration.style.opacity = "0"; 
                        setTimeout(function() {
                            wincelebration.style.display = "none";
                            wincelebration.style.opacity = "1"; 
                            resetGame();
                        }, 600); 
                    }, 4000);

                    myMoney.textContent = parseInt(myMoney.textContent) + inputMoney.value * 2;
                } else if (mySums === botSums) {
                    setTimeout(function() {
                        document.getElementById("draw-celebration").style.display = "flex";
                    }, 500);
                    setTimeout(function() {
                        const drawcelebration = document.getElementById("draw-celebration");
                        drawcelebration.style.opacity = "0"; 
                        setTimeout(function() {
                            drawcelebration.style.display = "none";
                            drawcelebration.style.opacity = "1"; 
                            resetGame();
                        }, 600); 
                    }, 4000);
                    myMoney.textContent = parseInt(myMoney.textContent) + parseInt(inputMoney.value);
                    
                    if (isNaN(myMoney)) {
                        myMoney = 5000;
                        myMoney.textContent = myMoney;
                    }
                };

                startGameButton.disabled = false;
                document.getElementById("btn-take").classList.add("button-disabled");
                document.getElementById("btn-hold").classList.add("button-disabled");
                takeCardButton.disabled = true;
                holdCardsButton.disabled = true;
            }
        }, 1000);
    };

    addBotCards();
});

document.getElementById("reset-money").addEventListener("click", function () {
    var myMoneyElement = document.getElementById("my-money");
    var myMoney = parseInt(myMoneyElement.textContent);

    myMoney = 5000;
    myMoneyElement.textContent = myMoney;
});

function getValueOfCard(card) {
    let cardDetail = card.split("-");
    let value = cardDetail[0];

    if (isNaN(value)) {
        // Kartu AS
        if (value == "A") return 11;
        // Kartu K, Q, J
        else return 10;
    }

    return parseInt(value);
}

function checkASCard(card) {
    if (card[0] == "A") return 1;
    else return 0;
}

function reduceASCardValue(sums, asCards) {
    while (sums > 21 && asCards > 0) {
        sums -= 10;
        asCards -= 1;
    }
    return sums;
}