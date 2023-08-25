#include <iostream>
#include <string>
#include <map>
#include <vector>

using namespace std;

const string PALAVRA_SECRETA = "MELANCIA";
map<char, bool> chutou;
vector<char> chutes_errados;

bool letra_existe(char chute) {
    for (char letra: PALAVRA_SECRETA) {
        if (chute == letra) {
            return true;
        }
    }
    return false;
}

bool nao_acertou() {
    for (char letra: PALAVRA_SECRETA) {
        if (!chutou[letra]) {
            return true;
        }
    }
    return false;
}

bool nao_enforcou() {
    return chutes_errados.size() < 5;
}

void cabecalho() {
    cout << "*****************" << endl;
    cout << "* Jogo da forca *" << endl;
    cout << "*****************" << endl;
    cout << endl;
}

void imprime_chutes_errados() {
    cout << "Chutes errados: " << endl;
    for (char letra: chutes_errados) {
        cout << letra << " " << endl;
    }
}

void imprime_palavra() {
    for (char letra: PALAVRA_SECRETA) {
        if (chutou[letra]) {
            cout << letra << " ";
        }

        if (!chutou[letra]) {
            cout << " - ";
        }
    }
}

void chuta() {
    cout << endl;

    char chute;
    cin >> chute;

    chutou[chute] = true;

    if (letra_existe(chute)) {
        cout << "Voce acertou! " << endl;
    }

    if (!letra_existe(chute)) {
        cout << "Voce errou! " << endl;
        chutes_errados.push_back(chute);
    }

    cout << endl;
}

int main() {
    cabecalho();

    while (nao_acertou() && nao_enforcou()) {
        imprime_chutes_errados();
        imprime_palavra();
        chuta();
    }

    cout << "Fim de jogo! " << endl;
    cout << "A palavra secreta era " << PALAVRA_SECRETA << endl;

    if (nao_acertou()) {
        cout << "Ops, Voce perdeu, tente novamente! " << endl;
    }

    if (!nao_acertou()) {
        cout << "Parabens voce ganhou! " << endl;
    }
}