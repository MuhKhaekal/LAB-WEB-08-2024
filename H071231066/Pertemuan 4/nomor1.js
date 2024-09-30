function countEvenNumbers(start, end) {

    let even = [];
    for (let i = start; i <= end; i++){
        if (i % 2 === 0){
            even.push(i);
        };
    };

    console.log("Output : "+ even.length, even);
}

countEvenNumbers(1, 10);