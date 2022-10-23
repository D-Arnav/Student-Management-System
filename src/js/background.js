function generateRandomPos(){
    const x = Math.floor(Math.random() * (window.innerWidth - 200));
    const y = Math.floor(Math.random() * (window.innerHeight - 200));
    return [x, y];
}

function checkCollision(X, Y){
    for (let i = 0; i < X.length; i++){
        for (let j = i + 1; j < Y.length; j++){
            if (Math.sqrt(Math.pow(X[i] - X[j], 2) + Math.pow(Y[i] - Y[j], 2)) < 200){
                return true;
            }
        }
    }
    return false;
}

function generateNPos(n){
    const X = [];
    const Y = [];
    while (X.length < n){
        const pos = generateRandomPos();
        X.push(pos[0]);
        Y.push(pos[1]);
    }
    if (checkCollision(X, Y)){
        return generateNPos(n);
    }
    return [X, Y];
}

function createShapes(n){
    let shape;
    const pos = generateNPos(n);
    const X = pos[0];
    const Y = pos[1];
    for (let i = 0; i < X.length; i++){
        shape = document.createElement('div');
        shape.className = 'shape';
        shape.style.left = X[i] + 'px';
        shape.style.top = Y[i] + 'px';
        shape.style.height = '200px';
        shape.style.width = '200px';
        shape.style.borderRadius = '50%';
        shape.style.position = 'absolute';
        shape.style.zIndex = '-1';
        document.body.appendChild(shape);
    }
    shape = document.getElementsByClassName('shape');
    shape[0].style.background = 'linear-gradient(#1845ad, #23a2f6)';
    shape[1].style.background = 'linear-gradient(#ff512f, #f09819)';
    shape[2].style.background = 'linear-gradient(#19f03d, #1cbb78)';
    shape[3].style.background = 'linear-gradient(#f01414, #f04949)';
}

createShapes(5);