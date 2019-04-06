<template>
    <div class="p-4">
        {{reactive}}
        <div class="flex">
            <div class="w-1/4">
            Circle 1 : <input v-model="circle.color" ><br />
            Circle 2 : <input v-model="circle2.color" ><br />
            </div>
            <div class="rounded-lg bg-grey-darkest" v-bind:style="container">
                <canvas id="c"  :key="canvasKey" :width="container.width" :height="container.height"></canvas>
            </div>
        </div>
    </div>
</template>
<script>
class ColoredCircle {
  constructor (pCanvas, pColor, pLeft, pTop) {
    this._canvas = pCanvas
    this._circle = new fabric.Circle({
      radius: 30, fill: pColor, left: pLeft, top: pTop, selectable: true
    });
    this._color = pColor
    pCanvas.add(this._circle)
  }
 
//  color mods
  get color(){
    return this._color
  }
  set color(pColor){
    this._circle.set('fill', pColor);
    this._canvas.renderAll()

    return this._color
  }
 

}
var grid = 30;


import {fabric} from 'fabric' 
export default {
    data(){
        return {
            
            circle: '',
            circle2: '',
            reactive:'active',
            container:{
                width: '600px',
                height: '400px',
            },
            canvas:{
                innerWidth: '600px',
                innerHeight: '400px',
            },
            editing: true,
            canvasKey: 0,
        }
    },
  mounted(){

    var canvas = new fabric.Canvas('c');
    var circle = new ColoredCircle(canvas, 'red', 60, 30 )
    var circle2 = new ColoredCircle(canvas, 'green', 180, 90)
    var circle2 = new ColoredCircle(canvas, 'blue', 240, 120)

    this.circle = circle
    this.circle2 = circle2
        if(this.editing){

            for (var i = 0; i < (600 / grid); i++) {
                canvas.add(new fabric.Line([ i * grid, 0, i * grid, 600], { stroke: 'rgba(255,255,255,0.1)', selectable: false }));
                canvas.add(new fabric.Line([ 0, i * grid, 600, i * grid], { stroke: 'rgba(255,255,255,0.1)', selectable: false }))
            }
        }
        canvas.on('object:moving', function(options) { 
        options.target.set({
            left: Math.round(options.target.left / grid) * grid,
            top: Math.round(options.target.top / grid) * grid
        });
        });
  }

}
</script>
