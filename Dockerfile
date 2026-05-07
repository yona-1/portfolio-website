FROM nginx:alpine

RUN adduser -D -u 1001 appuser

COPY . /usr/share/nginx/html

RUN chown -R appuser:appuser /usr/share/nginx/html

USER appuser

EXPOSE 8080

CMD ["nginx", "-g", "daemon off;"]