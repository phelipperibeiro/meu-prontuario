FROM nginx:1.15.0-alpine

#removendo arquivo default.conf
RUN rm /etc/nginx/conf.d/default.conf

#copiando o template nginx.conf para o diretório -> conf.d
COPY ./nginx.conf /etc/nginx/conf.d
