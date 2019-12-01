$(function() {
    let imgs = $(".lb img")
    let box = $(".lb")
    let prev = $(".prev")
    let next = $(".next")
    let dians = $(".dian div")
    let flag = false
    let prevIndex = nowIndex = 0

    imgs.not(":first").css("left", "500px")

    function run(type = 0) {
        flag = false
        if (type == 0) {
            nowIndex += 1
            if (nowIndex >= imgs.length) {
                nowIndex = 0
            }
            imgs.eq(nowIndex).css("left", "500px").animate({ "left": "0px" }, 500)
            imgs.eq(prevIndex).animate({ "left": "-300px" }, 500)
            flag = true
            prevIndex = nowIndex

            dians.css("background", "#808080").eq(nowIndex).css("background", "white")
        } else {
            nowIndex -= 1
            if (nowIndex < 0) {
                nowIndex = imgs.length - 1
            }
            imgs.eq(nowIndex).css("left", "-300px").animate({ "left": "0px" }, 500)
            imgs.eq(prevIndex).animate({ "left": "500px" }, 500)
            flag = true
            prevIndex = nowIndex

            dians.css("background", "#808080").eq(nowIndex).css("background", "white")
        }
    }
    let t = setInterval(run, 2000)

    next.click(function() {
        if (flag) {
            run()
        }
    })
    prev.click(function() {
        if (flag) {
            run(1)
        }
    })

    box.hover(function() {
        clearInterval(t)
    }, function() {
        t = setInterval(run, 2000)
    })

    dians.click(function() {
        let i = $(this).index()
        nowIndex = i
        imgs.eq(nowIndex).css("left", "500px").animate({ "left": "0px" }, 1000)
        imgs.eq(prevIndex).animate({ "left": "-500px" }, 1000)
        prevIndex = nowIndex
        dians.css("background", "#808080").eq(nowIndex).css("background", "white")
    })
})