<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Exception;

class ContactController extends Controller
{
    // Listar todos los contactos
    public function index()
    {
        $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));
    }

    // Mostrar el formulario de creación de un contacto
    public function create()
    {
        return view('contacts.create');
    }

    // Almacenar un nuevo contacto
    public function store(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:contacts,email',
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string|max:255',
            'status' => 'required|in:vendido,no interesado,contactado,no contactado',
        ]);

        try {
            // Creación del nuevo contacto
            Contact::create($request->all());

            return redirect()->route('contacts.index')->with('success', 'Contacto agregado correctamente.');
        } catch (Exception $e) {
            return redirect()->route('contacts.create')->withErrors('Hubo un problema al agregar el contacto.');
        }
    }

    // Mostrar los detalles de un contacto
    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    // Mostrar el formulario de edición de un contacto
    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    // Actualizar un contacto
    public function update(Request $request, Contact $contact)
    {
        // Validación de los datos
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:contacts,email,' . $contact->id,
            'phone' => 'required|string|max:20',
            'address' => 'nullable|string|max:255',
            'status' => 'required|in:vendido,no interesado,contactado,no contactado',
        ]);

        try {
            // Actualización del contacto
            $contact->update($request->all());

            return redirect()->route('contacts.index')->with('success', 'Contacto actualizado correctamente.');
        } catch (Exception $e) {
            return redirect()->route('contacts.edit', $contact->id)->withErrors('Hubo un problema al actualizar el contacto.');
        }
    }

    // Eliminar un contacto
    public function destroy(Contact $contact)
    {
        try {
            $contact->delete();

            return redirect()->route('contacts.index')->with('success', 'Contacto eliminado correctamente.');
        } catch (Exception $e) {
            return redirect()->route('contacts.index')->withErrors('Hubo un problema al eliminar el contacto.');
        }
    }

    // Mostrar el formulario de contacto
    public function contactForm()
    {
        return view('contacts.contact');  // Vista del formulario de contacto
    }

    // Procesar y almacenar el formulario de contacto
    public function storeContact(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:contacts',
            'phone' => 'required|string|max:20',
            'message' => 'nullable|string|max:1000',
        ]);

        // Almacenar el contacto en la base de datos
        Contact::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'message' => $request->message,
            'status' => 'no contactado', // Valor predeterminado
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->route('contact.form')->with('success', 'Tu mensaje ha sido enviado correctamente.');
    }
}
