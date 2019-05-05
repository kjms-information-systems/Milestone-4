//Javascript for the example!

function linkCss() {
    var link = document.createElement("link");
    link.href = "../css/css";
    link.type = "text/css";
    link.rel = "stylesheet";
    var head = document.getElementsByTagName("head")[0]
    head.appendChild(link);
    console.log("Stylesheet linked!");
}

function unlinkCss() {
    document.styleSheets[0].disabled = true;
    console.log("Stylesheet unlinked!");
}

function example2() {
    var elements = document.getElementsByClassName('appear');
    for(var i = 0; i < elements.length; i++) {
        elements[i].style.display = 'block';
        console.log("Element ");
    }
    console.log("Example 2 displayed!");
}

function example3() {
    var ex3 = document.getElementById("ex3");
    
    ex3.innerHTML = ex3.innerHTML + " (changed by external file)";
    ex3.style.color = "green";
    var elements = document.getElementsByClassName('linkex');
    
    for(var i = 0; i < elements.length; i++) {
        elements[i].style.display = 'block';
    }
    
    console.log("Example 3 displayed!");
}

function example4() {
    alert("This is an alert box! Use these if you need to get the user's attention!");
    console.log("Example 4 displayed!");
}

function example5() {
    var x = 2;
    var y = 4;
    console.log("Example 5: \n\t" + (x + y) + "\n\tElement displayed!");
    document.getElementById("ex5").style.display = "block";
    document.getElementById("final-note").style.display = "block";
}

