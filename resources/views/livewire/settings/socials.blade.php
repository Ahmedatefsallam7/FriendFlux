@section('title', 'Social Accounts')
<div class="main-content bg-lightblue theme-dark-bg right-chat-active">

    <div class="middle-sidebar-bottom">
        <div class="middle-sidebar-left">
            <div class="middle-wrap">
                <div class="card w-100 border-0 bg-white shadow-xs p-0 mb-4">
                    <div class="card-body p-4 w-100 bg-current border-0 d-flex rounded-3">
                        <a title="back" href="{{ route('settings') }}" class="d-inline-block mt-2"><i class="font-sm text-white">
                                <span><?php echo $icons->getIcon('skip-back'); ?></span>
                            </i></a>
                        <span style="color: white;margin-right: 550px;font-size: 20px;font-weight: 700">Social
                            Accounts</span>
                    </div>
                    <div class="card-body p-lg-5 p-4 w-100 border-0">
                        <form wire:submit.prevent="save">
                            <div class="row">

                                <div class="col-lg-6 mb-3">
                                    <div class="form-group">
                                        <label class="mont-font fw-600 font-xsss">Facebook</label>
                                        <input type="url" wire:model='Facebook' name="Facebook" class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-6 mb-3">
                                    <div class="form-group">
                                        <label class="mont-font fw-600 font-xsss">Twitter</label>
                                        <input type="url" wire:model='Twitter' name="Twitter" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <div class="form-group">
                                        <label class="mont-font fw-600 font-xsss">Linkedin</label>
                                        <input type="url" wire:model='Linkedin' name="Linkedin" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div class="form-group">
                                        <label class="mont-font fw-600 font-xsss">Github</label>
                                        <input type="url" wire:model='Github' name="Github" class="form-control">
                                    </div>
                                </div>
                                @if (!$userAccounts)
                                <div class="col-lg-12 mb-0 mt-2 text-center">
                                    <button type="submit" class="bg-current text-center text-white font-xsss fw-600 p-3 w175 rounded-3 d-inline-block">Save</button>
                                </div>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
