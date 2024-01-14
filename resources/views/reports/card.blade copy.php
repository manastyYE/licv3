صف الرسوم المحلية
                <div class="row" style="margin-top: 10mm">

                    <div class="col">
                        <div style="margin-right: 60mm">
                            {{-- المبلغ --}}
                        @if($clip->local_fee > 0)
                        {{ $clip->local_fee }}
                    @else
                        //
                    @endif
                        </div>
                    </div>
                    <div class="col">
                        {{-- ارقام السندات --}}
                        @if($clip->local_reseve > 1)
                            {{ $clip->local_reseve }}
                        @else
                            //
                        @endif
                    </div>
                    <div class="col">
                        {{-- التاريخ --}}
                        @if($clip->local_reseve > 1)
                            {{ $clip->local_reseve_date }}
                        @else
                            //
                        @endif
                    </div>
                    <div class="col">
                        {{-- ملاحظة --}}
                        @if($clip->local_reseve_note)
                            {{ $clip->local_reseve_note }}
                        @else
                            //
                        @endif
                    </div>
                </div>
                {{-- صف الرسوم الاخرى --}}
                <div class="row">
                    <div class="col">

                    </div>
                    <div class="col">
                        {{-- المبلغ --}}
                        @if($clip->el_gate > 0)
                            {{ $clip->el_gate }}
                        @else
                            //
                        @endif
                    </div>
                    <div class="col">
                        {{-- ارقام السندات --}}
                        @if($clip->el_gate_reseve > 1)
                            {{ $clip->el_gate_reseve }}
                        @else
                            //
                        @endif
                    </div>
                    <div class="col">
                        {{-- التاريخ --}}
                        @if($clip->el_gate_reseve > 1)
                            {{ $clip->el_gate_reseve_date }}
                        @else
                            //
                        @endif
                    </div>
                    <div class="col">
                        {{-- ملاحظة --}}
                        @if($clip->local_reseve_note)
                            {{ $clip->el_gate_reseve_note }}
                        @else
                            //
                        @endif
                    </div>
                </div>
                {{-- صف رسوم الدعاية والاعلان --}}
                <div class="row">

                    <div class="col">
                        <div style="margin-right: 60mm">
                            {{-- المبلغ --}}
                        @if($clip->total_ad)
                        {{ $clip->total_ad }}
                    @else
                        //
                    @endif
                        </div>
                    </div>
                    <div class="col">
                        {{-- ارقام السندات --}}
                        @if($clip->ad_reseve)
                            {{ $clip->ad_reseve }}
                        @else
                            //
                        @endif
                    </div>
                    <div class="col">
                        {{-- التاريخ --}}
                        @if($clip->ad_reseve_date )
                            {{ $clip->ad_reseve_date }}
                        @else
                            //
                        @endif
                    </div>
                    <div class="col">
                        {{-- ملاحظة --}}
                        @if($clip->ad_reseve_note)
                            {{ $clip->ad_reseve_note }}
                        @else
                            //
                        @endif
                    </div>
                </div>
                {{-- صف رسوم النظافة --}}
                <div class="row">
                    <div class="col">

                    </div>
                    <div class="col">
                        {{-- المبلغ --}}
                        @if($clip->clean)
                            {{ $clip->clean }}
                        @else
                            //
                        @endif
                    </div>
                    <div class="col">
                        {{-- ارقام السندات --}}
                        @if($clip->ad_reseve)
                            {{ $clip->ad_reseve }}
                        @else
                            //
                        @endif
                    </div>
                    <div class="col">
                        {{-- التاريخ --}}
                        @if($clip->ad_reseve_date )
                            {{ $clip->ad_reseve_date }}
                        @else
                            //
                        @endif
                    </div>
                    <div class="col">
                        {{-- ملاحظة --}}
                        @if($clip->ad_reseve_note)
                            {{-- {{ $clip->ad_reseve_note }} --}}
                        @else
                            //
                        @endif
                    </div>
                </div>
                {{-- صف رسوم نظافة المهن --}}
                <div class="row">
                    <div class="col">

                    </div>
                    <div class="col">
                        {{-- المبلغ --}}
                        @if($clip->clean_pay > 0)
                            {{ $clip->clean_pay }}
                        @else
                            //
                        @endif
                    </div>
                    <div class="col">
                        {{-- ارقام السندات --}}
                        @if($clip->ad_reseve)
                            {{ $clip->ad_reseve }}
                        @else
                            //
                        @endif
                    </div>
                    <div class="col">
                        {{-- التاريخ --}}
                        @if($clip->ad_reseve_date )
                            {{ $clip->ad_reseve_date }}
                        @else
                            //
                        @endif
                    </div>
                    <div class="col">
                        {{-- ملاحظة --}}
                        @if($clip->ad_reseve_note)
                            {{-- {{ $clip->ad_reseve_note }} --}}
                        @else
                            //
                        @endif
                    </div>
                </div>
