<style>
.seat, .row-label, .column-label {
	 margin: 4px;
	 display: inline-block;
	 overflow: hidden;
}
 .row-label, .column-label {
	 color: #999;
	 font-size: 12px;
	 width: 24px;
	/* margin: 4px;
	 */
	 text-align: center;
	 overflow: hidden;
}
 input[type="checkbox"] {
	 margin: 0;
	 padding: 0;
	 outline: none;
	 cursor: pointer;
	 -webkit-appearance: none;
	 -moz-appearance: none;
	 display: none;
}
 .seat label {
	 width: 20px;
	 height: 20px;
	 border-radius: 2px;
	 background: transparent;
	 outline: none;
	 cursor: pointer;
	 border: 2px solid #ccc;
	 display: block;
	 position: relative;
}
 .seat label:hover {
	 border-color: limegreen;
}
 .seat label:after {
	 content: "";
	 position: absolute;
	 top: 0;
	 left: 0;
	 width: 20px;
	 height: 20px;
	 transform: scale(0);
	 transition: all 150ms ease;
}
 .seat input[type="checkbox"]:disabled + label {
	 border-color: #ff8da1;
	 background: pink;
	 opacity: 0.66;
	 cursor: not-allowed;
}
 .seat input[type="checkbox"]:checked + label {
	 border-color: green;
}
 .seat input[type="checkbox"]:checked + label:after {
	 background-color: limegreen;
	 transform-origin: 50% 50%;
	 transform: scale(1);
}
 
</style>
<div class="container">
  <div class="row">
    <div class="column-label">&nbsp;</div>
    <div class="column-label">1</div>
    <div class="column-label">2</div>
    <div class="column-label">3</div>
    <div class="column-label">4</div>
    <div class="column-label">5</div>
    
  </div>
  <div class="row">
    <div class="row-label">A</div>
    <div class="seat">  
      <input type="checkbox" value="None" id="seat1" name="check" />
      <label for="seat1"></label>
    </div>
    <div class="seat">  
      <input type="checkbox" value="None" id="seat2" name="check" checked/>
      <label for="seat2"></label>
    </div>
    <div class="seat">  
      <input type="checkbox" value="None" id="seat3" name="check" />
      <label for="seat3"></label>
    </div>
    <div class="seat">  
      <input type="checkbox" value="None" id="seat4" name="check" />
      <label for="seat4"></label>
    </div>
    <div class="seat">  
      <input type="checkbox" value="None" id="seat5" name="check" />
      <label for="seat5"></label>
    </div>
   
  </div>
  <div class="row">
    <div class="row-label">B</div>
    <div class="seat">  
      <input type="checkbox" value="None" id="seat11" name="check" />
      <label for="seat11"></label>
    </div>
    <div class="seat">  
      <input type="checkbox" value="None" id="seat12" name="check" />
      <label for="seat12"></label>
    </div>
    <div class="seat">  
      <input type="checkbox" value="None" id="seat13" name="check" />
      <label for="seat13"></label>
    </div>
    <div class="seat">  
      <input type="checkbox" value="None" id="seat14" name="check" disabled/>
      <label for="seat14"></label>
    </div>
    <div class="seat">  
      <input type="checkbox" value="None" id="seat15" name="check" disabled/>
      <label for="seat15"></label>
    </div>
    
    </div>
  </div>
  <div class="row">
    <div class="row-label">C</div>
    <div class="seat">  
      <input type="checkbox" value="None" id="seat21" name="check" />
      <label for="seat21"></label>
    </div>
    <div class="seat">  
      <input type="checkbox" value="None" id="seat22" name="check" />
      <label for="seat22"></label>
    </div>
    <div class="seat">  
      <input type="checkbox" value="None" id="seat23" name="check" />
      <label for="seat23"></label>
    </div>
    <div class="seat">  
      <input type="checkbox" value="None" id="seat24" name="check" />
      <label for="seat24"></label>
    </div>
    <div class="seat">  
      <input type="checkbox" value="None" id="seat25" name="check" />
      <label for="seat25"></label>
    </div>
    </div>
  </div>
</div>