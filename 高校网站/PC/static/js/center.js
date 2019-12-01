var list = document.querySelectorAll(".items");
var content = document.querySelectorAll(".content");
//默认显示第一个
for (let j = 0; j < list.length; j++) {
    list[j].onclick = function() {
        index = j;
        for (let i = 0; i < list.length; i++) {
            content[i].style.display = "none";
            list[i].classList.remove("active");
        }
        content[index].style.display = "block";
        list[index].classList.add("active");
    }
}
//默认显示第一个，添加第一个的点击事件
list[0].onclick();