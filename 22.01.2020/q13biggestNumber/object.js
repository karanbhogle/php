Product = function(price){
    this.price = price;
}

p1 = new Product(10);
alert(p1.price);
p2 = p1;
p1.price = 30;
console.log(p2.price);