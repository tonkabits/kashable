import Vue from 'vue'

const _data = {
    height: 0,
    width:0,

    // begining cordenates
    initialX: 0,
    initialY: 0,

    cursorPreviousX: 0,
    cursorPreviousY: 0,

    // how much is the cursor moving
    draggerOffsetLeft: 0,
    draggerOffsetTop: 0,


    //listener for if the mouse is down
    down: false,
}

// when we click down in a element
export function mousedown(e, element, _data) {

    _data.width = element.offsetWidth
    _data.height = element.offsetHeight
    _data.down = true
    _data.initialX = e.clientX
    _data.initialY = e.clientY
}

// when we move the mouse
export function mousemove(e, element, _data){

    if (_data.down) {

    element.style.left = _data.draggerOffsetLeft + (e.clientX - _data.initialX) + 'px'
    element.style.top = _data.draggerOffsetTop + (e.clientY - _data.initialY) + 'px'
    
    }

    _data.cursorPreviousX = e.clientX
    _data.cursorPreviousY = e.clientY
}


// when we release the mouse
export function mouseup(element, _data) {
    _data.down = false,
    setDraggerOffset(element, _data)
    
}


// we calculate the amount we move the mouse
export function setDraggerOffset(element, _data) {
    
        
    _data.draggerOffsetLeft = element.offsetLeft
    _data.draggerOffsetTop = element.offsetTop

 
}

// we export our behaviour
export default  Vue.directive('draggable' , {
    inserted: function (element, ) {
        element.addEventListener('mousedown', (e) => mousedown(e, element, _data))
        element.addEventListener('mousemove', (e) => mousemove(e, element, _data))
        element.addEventListener('mouseup', (e) => mouseup(e, element, _data))
        setDraggerOffset(el, _data)
    }
})
    


