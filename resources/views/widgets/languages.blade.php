	<div id="lang" class="wow fadeInRight">
	<select id="soflow"  onChange="console.log(this.options[this.selectedIndex]);if(this.options[this.selectedIndex].value!=''){window.location=this.options[this.selectedIndex].value}else{this.options[selectedIndex=0];}">
		@foreach($langs as $lang)
		<option <?php if($lang->locale == config('app.locale')) {echo 'selected';} ?> value="/lang/{{ $lang->locale }}">{{ $lang->name }}</option>
		@endforeach
	</select>
	</div>
