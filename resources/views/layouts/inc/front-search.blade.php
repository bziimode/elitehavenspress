<div class="dropdown1">
    <div class="dropdown1-wrap">
        <div class="dropdown-content">   
            <button class="close"><i class="fas fa-times"></i></button>
            <form id="frmFilter5" action="//www.elitehavens.com/searchresults.aspx" method="post">
                {{ csrf_field() }}
                <input type="hidden" id="txtMinPrice" value="0" />
                <input type="hidden" id="txtMaxPrice" value="100000" />
                <input type="hidden" id="txtOrigMinBed" value="1" />
                <input type="hidden" id="txtMinBed" value="17" />
                <input type="hidden" id="txtOrigMaxBed"  value="16" />
                <input type="hidden" id="txtMaxBed" value="16" />
                <input type="hidden" id="isSubmit" />	
                <input type="hidden" id="Sort" value="rowid"/>	
                <div id="divArea"></div>

                <label for="destination">Location</label>
                <select name="destination" id="drp-destination">
                    <option value="">Choose</option>
                    @if (@$destinations)
                        @foreach(@$destinations as $key => $value)
                            <option value="{!! $key !!}">{!! $value !!}</option>
                        @endforeach
                    @endif
                    
                </select>
                <label for="numberofguest">Number of Bedrooms</label>
                <select name="numberofguest" id="numberofguest">
                    <option value="">Choose</option>
                    @if (@$bedrooms)
                        @foreach($bedrooms as $k => $v)
                            <option value="{!! $k !!}">{!! $v !!}</option>
                        @endforeach
                    @endif
                </select>
                
                <div class="row">       
                
                <div class="form-item">    
                    <label for="numberofguest">Check in</label>                                
                    <input name="quick_txtArrivalDate" type="text" id="quick_txtArrivalDate" class="txtArrivalDate" readonly="readonly" placeholder="Check in" required="">
                </div>
        
                <div class="form-item">
                    <label for="numberofguest">Check out</label>
                    <input name="quick_txtDepartDate" type="text" id="quick_txtDepartDate" class="quick_txtDepartDate" readonly="readonly" placeholder="Check out" required="">
                </div>
            </div>
                <div class="form-item">
                    <button type="submit" onclick="$('#isSubmit').val('1');$('#frmFilter5').submit()">Find your ideal haven</button>                                    
                </div>
            </form>
        </div> 
    </div> 
</div>