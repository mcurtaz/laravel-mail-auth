<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post; // si usa il model Post della tabella post
use App\Mail\PostAction; // Si utilizza anche PostAction che contiene la classe Mail (è un oggetto che richiama nel costruttore alcuni dati che si vogliono inserire nella mail in più crea il modello della mail chiamando una view e aggiungendo altre specifiche)
use Illuminate\Support\Facades\Mail; 
use Illuminate\Support\Facades\Auth;

class LoggedController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function delete($id){

        $post = Post::findOrFail($id);

        $post -> delete();

        $user = Auth::user();

        $action = "delete";

        Mail::to('admin@gmail.com') -> send(new PostAction($user, $post, $action)); // quando un utente cancella un post. oltre a cercare il post nel database, cancellarlo e reindirizzare la pagina sulla view index. Viene mandata una mail. Il modello di mail è definito in PostAction. La contruct di postAction richiede 3 argomenti. Il user che ha fatto l'azione che viene recuperato con Auth::user() che restituisce un oggetto con tutti i dati dell'utente. Il post in questione che è già stato recuperato con la findOrFail() per poterlo cancellare e un action che semplicemente indica quale azione è stata compiuta ed essendo nel metodo delete() del controlle mettiamo una stringa con scritto delete.

        // Mail::to(indirizzo) si spiega da solo. volendo al posto di un indirizzo fisso si potrebbe mandarlo all'indirizzo mail dell'utente con Mail::to( $user -> mail ). Anche ->send() si spiega da solo. Poi si crea una istanza di PostAction passandogli i dati che servono alla contruct e la mail sarà inviata.

        // ATTENZIONE: in fase di deploy (sviluppo) stiamo utilizzando un servizio che si chiama mailtrap.io. In pratica nel file env vanno inseriti alcuni dati per sapere host (server smtp) porta, user e password dove inviare la mail (che non è a chi mandare ma tipo un "da dove passare"). Il servizio mailtrap ti fa vedere tutte le mail mandate a quel server con quel user e quella password ma non le fa passare. è una specie di fake con cui tu puoi controllare che tutto funzioni bene e bona. Per questo si può mettere qualsiasi cosa nel Mail::to('') che tanto arrivano tutte lì.

        return redirect() -> route('post-index');
    }

    public function edit($id){

        $post = Post::findOrFail($id);

        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id){

        $post = Post::findOrFail($id);

        $data = $request -> all();

        $post -> update($data);

        $user = Auth::user();

        $action = "update";

        Mail::to('admin@gmail.com') -> send(new PostAction($user, $post, $action));

        return redirect() -> route('post-index');
    }

    public function create(){

        return view('posts.create');

    }


    public function store(Request $request){

        $data = $request -> all();

        $post = Post::create($data);

        $user = Auth::user();

        $action = "create";

        Mail::to('admin@gmail.com') -> send(new PostAction($user, $post, $action));

        return redirect() -> route('post-index');
    }
}
