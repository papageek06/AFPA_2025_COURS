class Pokemon {

    constructor(name, hp, luck) {
        this.name = name;
        this.hp = hp;
        this.luck = luck;
    }

    generateRandomDefenseAndAttack(min, max) {
        return Math.floor(Math.random() * (max - min + min) + min);
    }

    isLucky() {

        let chance = Math.random();

        // if(chance < this.luck) {
        //     return true;
        // } else {
        //     return false;
        // }

        // condition ternaire
        return (chance < this.luck) ? true : false;
    }

    attackPokemon(pokemonEnemy) {

        // pokemon qui attaque
        this.attack = this.generateRandomDefenseAndAttack(10, 20);
        this.defense = this.generateRandomDefenseAndAttack(1, 5);

        // pokemon qui défend
        pokemonEnemy.attack = this.generateRandomDefenseAndAttack(10, 20);
        pokemonEnemy.defense = this.generateRandomDefenseAndAttack(1, 5);

        // console.log("pokmeon qui défend : ", pokemonEnemy);
        // console.log("pokmeon qui attaque : ", this);

        if(this.isLucky()) {

            let damage = this.attack - pokemonEnemy.defense;
            console.log(this.name + " inflige " + damage + " dégâts à " + pokemonEnemy.name);
            pokemonEnemy.hp -= damage;
            console.log(pokemonEnemy.name + " a dorénavant " + pokemonEnemy.hp + " points de vie.");

            // pokemonEnemy.hp = pokemonEnemy.hp - damage;

            if(pokemonEnemy.hp <= 0) {
                console.log(this.name + " a vaincu " + pokemonEnemy.name + " ! FIN DU JEU.");
            }

        } else {
            console.log(this.name + " a raté son attaque, 0 dégâts infligés à " + pokemonEnemy.name);
        }

    }

}

let pika = new Pokemon("Pika", 45, 0.5);
let bulbi = new Pokemon("Bulbi", 39, 0.7);

while(pika.hp > 0 && bulbi.hp > 0) {

    pika.attackPokemon(bulbi);

    if(bulbi.hp > 0) {
        bulbi.attackPokemon(pika);
    }

}