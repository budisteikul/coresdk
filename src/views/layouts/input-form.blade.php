<div class="h-100 w-100 pl-2 pr-2 pt-0" style="overflow-x:hidden;"> 		
    <div class="row justify-content-center">
        <div class="col-md-12 pr-0 pl-0 pt-0 pb-0">
             <div class="card border-0">
                <div class="card-header pr-0">
                    <div class="row align-items-center w-100">
                        <div class="col text-left">
                            <div class="d-flex align-self-center">
                                {{ $mainTitle }}
                            </div>
                        </div>
                        <div class="col-auto text-right mr-0 pr-0">
                            <div class="btn-toolbar justify-content-end">
                                <button class="btn btn-sm btn-danger mr-0" type="button" onClick="$.fancybox.close();"><i class="fa fa-window-close"></i> Close</button>
                            </div>
                        </div>
                    </div>
                </div>
	           <div class="card-body">
                    @yield('content')
               </div>
            </div>  
        </div>
    </div>
</div>