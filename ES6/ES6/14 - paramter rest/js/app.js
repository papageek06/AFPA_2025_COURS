const sum = (...nbrs) => { // nbrs [array]

    let total = 0;

    for(const nbr of nbrs) {
        total += nbr;
    }

    // nbrs.forEach((nbr, index) => {
    //     total += nbr;
    // });

    // for(let i = 0; i < nbrs.length; i++) {
    //     total += nbrs[i];
    // }

    return total;

}

console.log(sum(1, 40, 19));
console.log(sum(1, 40, 19, 989, 23));
