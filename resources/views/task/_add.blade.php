 

        <div class="mt-3 row d-flex justify-content-center align-items-center h-100 w-50">


            
            <div class="col">
                <div class="card" id="list1" style="border-radius: .75rem; background-color: #eff1f2;">
                    <div class="card-body py-4 px-4 px-md-3">
                        {{-- <p class="h4 text-center mt-9 mb-4 pb-9 text-secondary">
                            <i class="fas fa-check-square me-1"></i> 
                            Not
                        </p> --}}
                        @include('common.alert')
        
                        <div class="pb-2">
                            <div class="card">
                                <div class="card-body form-group-control">
                                    <form action="/task.store" method="POST" >
                                        @csrf
                                        <div class="mb-3">
                                            <div>
                                                <label for="exampleFormControlTextarea1" class="form-label">Not:</label>
        
        
                                                <textarea class="form-control" id="inputTextArea" name="writed_task" rows="3" placeholder="Notunuzu yazınız...">{{ old('not') }}</textarea>
        
        
                                            </div>
                                            <div style="padding: 1%">
                                                <button type="button" id="clearBtn" style="float: right"
                                                    class="btn btn-light btn-sm">Notu Temizle</button>
        
                                            </div>
                                            <div>
                                                <label>Yapılması gereken tarih </label>
                                                <input class="small form-control w-auto mb-3" name="last_date"
                                                    type="date" value="<?php echo date('Y-m-d'); ?>" />
        
                                            </div>
                                            <label for="">Önem Derecesi</label>
                                            <select class="select form-control w-auto mb-3"  name="priority_level">
                                                <option value="high">yüksek</option>
                                                <option value="medium" selected>normal</option>
                                                <option value="low">düşük</option>
        
                                            </select>
                                            <div>
                                                <hr>
                                                <div class="text-center">
                                                    <button  type="submit" class="btn btn-success btn-sm ">Notunuzu Ekleyin</button>

                                                </div>
        
                                                <script>
                                                    // JavaScript
                                                    const clearBtn = document.querySelector('#clearBtn');
                                                    const inputTextArea = document.querySelector('#inputTextArea');
        
                                                    clearBtn.addEventListener('click', () => {
                                                        inputTextArea.value = "";
                                                    });
                                                </script>
                                            </div>
        
        
        
                                    </form>
        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        
            </div>
        
        </div>
