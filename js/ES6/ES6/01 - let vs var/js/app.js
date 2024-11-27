function count() {

    // var il a une portée de fonction
    for(var i = 0; i < 5; i++) {
        console.log( "n°" + i);
    }

    console.log("i à l'exétieur de l'itération :" + i);
}

count();

function count2() {

    // let il a une portée de block
    for(let i = 0; i < 5; i++) {
        console.log( "n°" + i);
    }

    console.log("i à l'exétieur de l'itération :" + i);

}

count2();