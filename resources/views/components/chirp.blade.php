@props(['chirp'])

<div class="card bg-base-100 shadow w-full h-28 overflow-hidden">
    <div class="card-body h-full p-4">
        <div class="flex h-full items-start space-x-3">
            @if($chirp->user)
                <div class="flex-shrink-0 w-8 h-8">
                    <div class="w-full h-full rounded-full bg-gradient-to-br from-primary via-secondary to-accent p-[1px] overflow-hidden">
                        <img src="https://avatars.laravel.cloud/{{ urlencode($chirp->user->email) }}"
                             alt="{{ $chirp->user->name }}'s avatar"
                             class="rounded-full bg-base-100 w-full h-full object-cover" />
                    </div>
                </div>
            @else
                <div class="flex-shrink-0 w-8 h-8">
                    <div class="w-full h-full rounded-full bg-gradient-to-br from-primary via-secondary to-accent p-[1px] overflow-hidden">
                        <img src="https://avatars.laravel.cloud/anonymous-user?vibe=stealth"
                             alt="Anonymous User"
                             class="rounded-full bg-base-100 w-full h-full object-cover" />
                    </div>
                </div>
            @endif

            <div class="flex-1 min-w-0 flex flex-col justify-between h-full">
                <div class="flex items-center justify-between gap-2">
                    <div class="flex items-center gap-1 min-w-0">
                        <span class="text-sm font-semibold truncate">{{ $chirp->user ? $chirp->user->name : 'Anonymous' }}</span>
                        <span class="text-base-content/60">&middot;</span>
                        <span class="text-sm text-base-content/60">{{ $chirp->created_at->diffForHumans() }}</span>
                    </div>

                    <div class="flex gap-1">
                        <a href="{{ route('chirps.edit', $chirp) }}" class="btn btn-ghost btn-xs">
                            Edit
                        </a>
                        <form method="POST" action="{{ route('chirps.destroy', $chirp) }}" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this chirp?')" class="btn btn-ghost btn-xs text-error">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>

                <div class="mt-2">
                    <p class="text-sm break-words whitespace-normal max-w-full overflow-hidden" style="display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical; overflow-wrap:anywhere; word-break:break-word;">
                        {{ $chirp->message }}
                    </p>
                </div>
                <div class="flex items-center gap-1">
                    <span class="text-sm font-semibold">{{ $chirp->user ? $chirp->user->name : 'Anonymous' }}</span>
                    <span class="text-base-content/60">·</span>
                    <span class="text-sm text-base-content/60">{{ $chirp->created_at->diffForHumans() }}</span>
                    @if ($chirp->updated_at->gt($chirp->created_at->addSeconds(5)))
                        <span class="text-base-content/60">·</span>
                        <span class="text-sm text-base-content/60 italic">edited</span>
                    @endif
                </div>
            </div>
            </div> 
        </div>
        
    </div>
</div>
