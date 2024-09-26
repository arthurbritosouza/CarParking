import mysql.connector
import datetime
from flask import Flask,make_response,jsonify,request 

app = Flask(__name__)

mydb = mysql.connector.connect(
    host="localhost",
    user="root",
    password="policia00",
    database="carparking"
)
    

@app.route('/cadastrar_veiculos', methods=['post'])
def cadastrar_veiculos():
    dados = request.json
    print(dados)    
    hora_ent = datetime.datetime.now()
    dia_ent = hora_ent.strftime("%d/%m/%Y")
    user_id = dados.get('user_id')
    placa = dados.get('placa')
    modelo = dados.get('modelo')
    status = int(1)
    cursor = mydb.cursor()
    query = "INSERT INTO carros (user_id,placa,modelo,hora_ent,dia_ent,status,created_at,updated_at) VALUES (%s,%s,%s,%s,%s,%s,%s,%s)"
    data = (user_id,placa,modelo,hora_ent,dia_ent,status,datetime.datetime.now(), datetime.datetime.now())
    cursor.execute(query, data)
    mydb.commit()
    # Retorna o JSON como resposta
    return ("cadastrado com sucesso")

@app.route('/editar_vec/<int:id>', methods=['POST'])
def editar_vec(id):
    dados = request.json
    
    campos = []
    valores = []

    if 'placa' in dados:
        campos.append("placa = %s")
        valores.append(dados.get('placa'))
    
    if 'modelo' in dados:
        campos.append("modelo = %s")
        valores.append(dados.get('modelo'))

    if 'hora_ent' in dados:
        campos.append("hora_ent = %s")
        valores.append(dados.get('hora_ent'))

    if 'hora_saida' in dados:
        campos.append("hora_saida = %s")
        valores.append(dados.get('hora_saida'))

    if 'dia_ent' in dados:
        campos.append("dia_ent = %s")
        valores.append(dados.get('dia_ent'))

    if 'dia_saida' in dados:
        campos.append("dia_saida = %s")
        valores.append(dados.get('dia_saida'))

    if 'status' in dados:
        campos.append("status = %s")
        valores.append(dados.get('status'))
    
    campos.append("updated_at = %s")
    valores.append(datetime.now())

    if not campos:
        return "Nenhum campo para atualizar", 400

    query = f"UPDATE carros SET {', '.join(campos)} WHERE id = %s"
    valores.append(id)  

    cursor = mydb.cursor()
    cursor.execute(query, valores)
    mydb.commit()
    return "Editado com sucesso"

@app.route('/excluir_carros/<int:id>', methods=['get'])
def excluir_carros(id):
    cursor = mydb.cursor()
    query = "DELETE FROM carros WHERE id = %s"
    data = (id,)
    cursor.execute(query,data)
    mydb.commit()
    return 'excluido'

@app.route('/devolvido/<int:id>', methods=['POST'])
def  devolvido(id):
    hora_saida = datetime.datetime.now()
    dia_saida = hora_saida.strftime("%d/%m/%Y")
    status = int(2)
    cursor = mydb.cursor()
    query = 'UPDATE carros SET hora_saida = %s,dia_saida = %s,status = %s,updated_at = %s WHERE id = %s'
    data = (hora_saida,dia_saida,status,datetime.datetime.now(),id)
    cursor.execute(query,data)
    mydb.commit()
    return 'devolvido'

@app.route('/cadastrar_reserva',methods=["post"])
def cadastrar_reserva(): 
    dados = request.json
    user_id = dados.get('user_id')
    placa = dados.get('placa')
    modelo = dados.get('modelo')
    data_reserva = dados.get('data_reserva')
    hora_reserva = dados.get('hora_reserva')
    cursor = mydb.cursor()
    query = "INSERT INTO reserva (user_id,placa,modelo,data_reserva,hora_reserva,updated_at,created_at) VALUES(%s,%s,%s,%s,%s,%s,%s)"
    data = (user_id,placa,modelo,data_reserva,hora_reserva,datetime.datetime.now(),datetime.datetime.now())
    cursor.execute(query,data)
    mydb.commit()
    return "Cadastrado"

@app.route('/estacionado/<int:id>',methods=["post"])
def estacionado(id):
    dados = request.json
    user_id = dados.get('   ')
    placa = dados.get('placa')
    modelo = dados.get('modelo')
    hora_ent = datetime.datetime.now()
    dia_ent = hora_ent.strftime("%d/%m/%Y")
    status = int(1)
    cursor = mydb.cursor()
    query = "INSERT INTO carros (user_id,placa,modelo,hora_ent,dia_ent,status,updated_at,created_at) VALUES(%s,%s,%s,%s,%s,%s,%s,%s)"
    data = (user_id,placa,modelo,hora_ent,dia_ent,status,datetime.datetime.now(),datetime.datetime.now())
    cursor.execute(query,data)
    query1 = "DELETE FROM reserva WHERE id = %s"
    data1 = (id,)
    cursor.execute(query1,data1)
    mydb.commit()
    return 'deu certo '
"""""
@app.route('/get_carros/<int:id>', methods=['GET'])
def get_carros(id):
    cursor = mydb.cursor(dictionary=True)
    query = "SELECT * FROM carros WHERE user_id = %s"
    data = (id,)
    cursor.execute(query, data)
    
    resultado = cursor.fetchall()
    cursor.close()

    # Processar os resultados para converter timedelta
    for veiculo in resultado:
        for key, value in veiculo.items():
            if isinstance(value, datetime.timedelta):
                # Converte timedelta em total de segundos
                veiculo[key] = value.total_seconds()  # ou str(value) para uma representação de string

    if not resultado:
        return jsonify({'message': 'Nenhum carro encontrado para este usuário.'}), 404

    return jsonify({'carros': resultado})  # Retorna os resultados em formato JSON
"""""

if __name__ == '__main__':
    app.run(debug=True)
