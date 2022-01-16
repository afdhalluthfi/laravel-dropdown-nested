<x-layout>
    <h5>Experiemnt Passing Data With Form case dropdown interactive</h5>
    <hr>
   

    <form class="row gx-3 gy-2 align-items-center">
        <div class="col-sm-3">
            <label class="visually-hidden" for="specificSizeInputName">Name</label>
            <input type="text" class="form-control" id="specificSizeInputName" placeholder="Jane Doe">
        </div>
        <div class="col-sm-3">
            <label class="visually-hidden" for="specificSizeInputGroupUsername">Username</label>
            <div class="input-group">
            <div class="input-group-text">@</div>
            <input type="text" class="form-control" id="specificSizeInputGroupUsername" placeholder="Username">
            </div>
        </div>
        <div class="col-sm-3">
            <x-dropdown id="dua">              
                <x-slot name="select">
                     @foreach ($dataProv as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </x-slot>                        
            </x-dropdown> 
        </div>
        <div class="col-sm-3">
            <x-dropdown id="satu">              
                <x-slot name="select">
                    
                </x-slot>                        
            </x-dropdown> 
        </div>
        <div class="col-sm-3">
            <x-dropdown id="tiga">              
                <x-slot name="select">
                    
                </x-slot>                        
            </x-dropdown> 
        </div>

        <div class="col-auto">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    @push('javascript')
        <script type="text/javascript">
            $(function() {
                    console.log('hello');
                    $('#dua').change(function() {
                        let proId=$(this).val();
                        $.ajax({
                            url: '/',
                            type: 'POST',
                            data:'kabId='+proId+'&_token={{csrf_token()}}',
                            success: function(data){
                                $('#satu').html(data);
                            }
                        })
                    })
                    $('#satu').change(function() {
                        let kabId=$(this).val();
                        $.ajax({
                            url: '/kec',
                            type: 'POST',
                            data:'kecId='+kabId+'&_token={{csrf_token()}}',
                            success: function(data){
                                $('#tiga').html(data);
                            }
                        })
                    })
            })
        </script>
    @endpush
</x-layout>