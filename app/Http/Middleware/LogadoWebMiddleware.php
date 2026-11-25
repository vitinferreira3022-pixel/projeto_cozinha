<?php

namespace App\Http\Middleware;

use App\Models\Aluno;
use App\Models\AlunoToken;
use App\Models\Funcionario;
use App\Models\FuncionarioToken;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class LogadoWebMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Cookie::has('funcionario_id') && Cookie::has('token')) {
            $funcionario_id = Cookie::get('funcionario_id');
            $token = Cookie::get('token');
            $request->aluno = 'N';
            $token_funcionario = FuncionarioToken::where('funcionario_id', $funcionario_id)
                ->where('token', $token)
                ->where('valido_ate', '>', Carbon::now())
                ->first();
            if ($token_funcionario) {
                $funcionario = Funcionario::find($funcionario_id);
                $request->funcionario = $funcionario;

                /*$admin = Admin::where('funcionario_id', $funcionario_id)->first();
                if($admin){
                    $request->admin = 'S';
                } else {
                    $request->admin = 'N';
                }
                */
                return $next($request);

            } else {
                if (Cookie::has('aluno_id') && Cookie::has('token')) {
                    $aluno_id = Cookie::get('aluno_id');
                    $request->sou_aluno = 'S';
                    $token = Cookie::get('token');
                    $token_aluno = AlunoToken::where('aluno_id', $aluno_id)
                        ->where('token', $token)
                        ->where('valido_ate', '>', Carbon::now())
                        ->first();

                    if ($token_aluno) {
                        $aluno = Aluno::find($aluno_id);
                        $request->aluno = $aluno;

                        return $next($request);
                    } else {
                        Cookie::forget('token');
                        Cookie::forget('aluno_id');

                        return redirect()->route('login');
                    }
                } else {
                    Cookie::forget('token');
                    Cookie::forget('aluno_id');

                    return redirect()->route('login');
                }
            }
        } else {
            if (Cookie::has('aluno_id') && Cookie::has('token')) {
                $aluno_id = Cookie::get('aluno_id');
                $request->aluno = 'S';
                $token = Cookie::get('token');
                $token_aluno = AlunoToken::where('aluno_id', $aluno_id)
                    ->where('token', $token)
                    ->where('valido_ate', '>', Carbon::now())
                    ->first();
                if ($token_aluno) {
                    $aluno = Aluno::find($aluno_id);
                    $request->aluno = $aluno;

                    return $next($request);
                } else {
                    Cookie::forget('token');
                    Cookie::forget('aluno_id');

                    return redirect()->route('login');
                }
            } else {
        
                Cookie::forget('token');
                Cookie::forget('funcionario_id');

                return redirect()->route('login');
            }

        }
    }
}
